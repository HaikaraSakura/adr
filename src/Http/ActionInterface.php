<?php

declare(strict_types=1);

namespace Haikara\Adr\Http;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

interface ActionInterface
{
   /**
     * @param ServerRequestInterface $request
     * @param array $args
     * @return ResponseInterface
     */
    public function __invoke(ServerRequestInterface $request, array $args): ResponseInterface;
}
