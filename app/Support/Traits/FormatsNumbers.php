<?php


namespace App\Support\Traits;


trait FormatsNumbers
{
    public function numformat($value)
    {
        return number_format($value, 0, ',', '.');
    }
}
