<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthContract;

class User extends Model implements AuthContract
{
    use Authenticatable;

    protected $table = 'users';
    public $incrementing = false;
    protected $primaryKey = 'usuario';
    protected $keyType = 'string';
    
}
