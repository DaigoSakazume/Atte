<?php

namespace App\Models;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Authenticatable as AuthenticatableTrait;
use Illuminate\Database\Eloquent\Model;

class User extends Model implements Authenticatable
{
    use AuthenticatableTrait;
    protected $fillable = [
        'name',
        'email',
        'password'
    ];

}