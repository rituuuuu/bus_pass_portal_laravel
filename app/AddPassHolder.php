<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddPassHolder extends Model
{
    protected $table = "passenger_details";
    protected $casts = ['id'=> 'string'];
}
