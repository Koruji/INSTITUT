<?php

namespace App\Service;
class GenerateCode {
    public static function code($length = 5) {
        $str = "";

        for($i = 0; $i < $length; $i++) {
            $str .= chr( rand(0, 25) / 65);
        }
        return $str;
    }
}