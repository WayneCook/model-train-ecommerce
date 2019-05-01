<?php

namespace App\Traits;

Trait Sanitizer
{

    public function clean(string $string): string
    {

        return preg_replace("/[^a-z0-9\.]/", "", strtolower($string));

    }

}
