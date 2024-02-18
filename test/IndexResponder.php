<?php

declare(strict_types=1);

namespace Haikara\Adr\Test;

use Haikara\Adr\Http\Payload\ViewAdapter\Typewriter\TypewriterAdapterInterface;
use Haikara\Adr\Http\ResponderInputInterface;
use Haikara\Adr\Http\ResponderInterface;
use Psr\Http\Message\ResponseInterface;

class IndexResponder implements ResponderInterface
{
    public function __construct(
        protected TypewriterAdapterInterface $view
    ) {
    }

    /**
     * @param ResponderInputInterface<IndexResponderInput> $input
     * @return ResponseInterface
     */
    public function respond(ResponderInputInterface $input): ResponseInterface
    {
        $this->view->assign('user', $input->user);

        return $this->view->render('view.php');
    }
}
