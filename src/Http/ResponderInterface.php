<?php

declare(strict_types=1);

namespace Haikara\Adr\Http;

use Psr\Http\Message\ResponseInterface;

interface ResponderInterface
{
    /**
     * Domainの結果に応じたResponseを作成して返す
     * @param ResponderInputInterface $input
     * @return ResponseInterface
     */
    public function respond(
        ResponderInputInterface $input
    ): ResponseInterface;
}
