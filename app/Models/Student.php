<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['fullname', 'email', 'phone', 'address', 'age', 'university'];
}
