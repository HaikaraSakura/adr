<?php

declare(strict_types=1);

namespace Haikara\Adr\Http\Payload;

use JsonSerializable;
use Psr\Http\Message\ResponseInterface;

interface JsonInterface
{
    public function payout(
        array|JsonSerializable $data,
        int $flags,
        int $depth
    ): ResponseInterface;
}