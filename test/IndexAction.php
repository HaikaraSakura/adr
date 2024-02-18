<?php

declare(strict_types=1);

namespace Haikara\Adr\Test;

use Haikara\Adr\Http\ActionInterface;
use Haikara\Adr\Http\ResponderInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class IndexAction implements ActionInterface
{
    /**
     * @var ResponderInterface
     */
    protected $responder;

    /**
     * @param ResponderInterface<IndexResponder> $responder
     */
    public function __construct(ResponderInterface $responder) {
        $this->responder = $responder;
    }

    public function __invoke(ServerRequestInterface $request, array $args): ResponseInterface {
        $user = new User(1, '氏名1', '部署1');

        $responderInput = new IndexResponderInput($user);

        return $this->responder->respond($responderInput);
    }
}
