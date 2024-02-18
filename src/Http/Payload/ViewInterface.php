<?php

declare(strict_types=1);

namespace Haikara\Adr\Http\Payload;

use Psr\Http\Message\ResponseInterface;

interface ViewInterface
{
    /**
     * @param string $filePath
     * @return ResponseInterface
     */
    public function render(string $filePath): ResponseInterface;
}