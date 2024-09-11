<?php

namespace App\Models\api;



class Product extends \App\Models\Product
{
   
    public function getRouteKeyName()
    {
        return 'id';
    }
}
