<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    protected $table = 'campaigns';
    protected $fillable = ['name', 'description', 'expectedrevenue','currentrevenue','status','beginning_month','beginning_year','ending_month','ending_year'];
}
