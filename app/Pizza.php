<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pizza extends Model
{
    protected $guarded = [];
    private $name;
    private $description;
    private $image;
    private $price;
}
