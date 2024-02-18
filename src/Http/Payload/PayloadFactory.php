<?php

namespace Haikara\Adr\Http\Payload;

use Haikara\Adr\Http\Payload\TemplateEngine\Typewriter\TypewriterAdapterInterface;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;

class PayloadFactory implements PayloadFactoryInterface
{
    protected ResponseInterface $response;

    public function __construct(ResponseFactoryInterface $responseFactory)
    {
        $this->response = $responseFactory->createResponse();
    }

    public function view(TypewriterAdapterInterface $templateEngine): ViewInterface
    {
        return new View($this->response, $templateEngine);
    }

    public function json(): JsonInterface
    {
        return new Json($this->response);
    }

    public function redirect(): RedirectInterface
    {
        return new Redirect($this->response);
    }
}