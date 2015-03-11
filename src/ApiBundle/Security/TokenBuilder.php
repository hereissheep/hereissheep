<?php

namespace ApiBundle\Security;

class TokenBuilder
{
    public function createToken()
    {
        return bin2hex(openssl_random_pseudo_bytes(16));
    }
}
