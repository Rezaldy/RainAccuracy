<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = array('date', 'time', 'data');
    protected $guarded = array('id');
}
