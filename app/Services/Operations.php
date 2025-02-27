<?php

namespace App\Services;

use Crypt;
use Illuminate\Contracts\Encryption\DecryptException;

class Operations {

    public static function money($value) {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

    public static function decryptId($value) {
        try {
            $value = Crypt::decrypt($value);
        } catch (DecryptException $e) {
            abort(403);
        }
        return $value;
    }

}