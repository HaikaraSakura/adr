<?php

declare(strict_types=1);

namespace Haikara\Adr\Http\Payload;

use Psr\Http\Message\ResponseInterface;

interface RedirectInterface
{
    /**
     * @param string $path
     * @return ResponseInterface
     */
    public function to(string $path): ResponseInterface;
}