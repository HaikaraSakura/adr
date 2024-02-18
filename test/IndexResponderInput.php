<?php

namespace Haikara\Adr\Test;

use Haikara\Adr\Http\ResponderInputInterface;

class IndexResponderInput implements ResponderInputInterface
{
    /**
     * @var User
     */
    public $user;

    public function __construct(User $user) {
        $this->user = $user;
    }
}