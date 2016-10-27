<?php

namespace App\Auth;

class Bcrypt
{

    public static function getHash($algoritimo, $data, $chave) {
        $hash = hash_init($algoritimo, HASH_HMAC, $chave);
        hash_update($hash, $data);
        return hash_final($hash);
    }

}