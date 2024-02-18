<?php

declare(strict_types=1);

namespace Haikara\Adr\Test;

use DateTimeImmutable;

class User
{
    public function __construct(
        public int $id,
        public string $name,
        public DateTimeImmutable $birthday
    ) {
    }
}
