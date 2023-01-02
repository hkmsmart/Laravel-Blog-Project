<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

// Model Auth işlemleri için extends kütüphanesi Auth olması gerekmektedir.
class Admin extends Authenticatable
{
    use HasFactory;
}
