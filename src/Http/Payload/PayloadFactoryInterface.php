<?php

declare(strict_types=1);

namespace Haikara\Adr\Http\Payload;

use Haikara\Adr\Http\Payload\TemplateEngine\Typewriter\TypewriterAdapterInterface;

interface PayloadFactoryInterface
{
    public function view(TypewriterAdapterInterface $templateEngine): ViewInterface;

    public function json(): JsonInterface;

    public function redirect(): RedirectInterface;
}