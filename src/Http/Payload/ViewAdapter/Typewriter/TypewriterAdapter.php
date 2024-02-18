<?php

namespace Haikara\Adr\Http\Payload\ViewAdapter\Typewriter;

use Haikara\Typewriter\Typewriter;
use Haikara\Typewriter\ViewModelInterface;
use Psr\Http\Message\ResponseInterface;

class TypewriterAdapter implements TypewriterAdapterInterface
{
    public function __construct(
        protected Typewriter $templateEngine,
        protected ResponseInterface $response
    ) {
    }

    /**
     * @inheritDoc
     */
    public function setBasePath(string $basePath): void
    {
        $this->templateEngine->setBasePath($basePath);
    }

    public function setViewModel(ViewModelInterface $viewModel): void
    {
        $this->templateEngine->setViewModel($viewModel);
    }

    /**
     * @inheritDoc
     */
    public function assign(string $name, mixed $value): void
    {
        $this->templateEngine->assign($name, $value);
    }

    /**
     * @inheritDoc
     */
    public function render(string $filePath): ResponseInterface
    {
        $html = $this->templateEngine->render($filePath);
        $this->response->getBody()->write($html);

        return $this->response;
    }
}