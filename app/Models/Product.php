<?php

namespace App\Models;

class Product extends \Lunar\Models\Product
{
    protected $appends = [
        'name',
    ];

    public function getNameAttribute()
    {
        return $this->translateAttribute('name');
    }
}
