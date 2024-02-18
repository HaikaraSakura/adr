<?php

declare(strict_types=1);

namespace Haikara\Adr\Http\Payload;

use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;

class Redirect implements RedirectInterface
{
    public function __construct(protected ResponseInterface $response)
    {
    }
    
    /** @inheritDoc */
    public function to(string $path): ResponseInterface
    {
        return $this->response
            ->withHeader('Location', $path)
            ->withStatus(302);
    }
}