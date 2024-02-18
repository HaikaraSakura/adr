<?php

declare(strict_types=1);

namespace Haikara\Adr\Http\Payload;

use JsonSerializable;
use Psr\Http\Message\ResponseFactoryInterface;
use Psr\Http\Message\ResponseInterface;

class Json implements JsonInterface
{
    public function __construct(protected ResponseInterface $response)
    {
    }

    public function payout(
        array|JsonSerializable $data,
        $flags = JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT | JSON_THROW_ON_ERROR,
        int $depth = 512
    ): ResponseInterface {
        $json = json_encode($data, $flags, $depth);
        $this->response->getBody()->write($json);

        return $this->response->withHeader('Content-Type', 'application/json');
    }
}