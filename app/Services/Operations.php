<?php

namespace App\Services;

class Operations {

    public static function money($value) {
        return 'R$ ' . number_format($value, 2, ',', '.');
    }

}