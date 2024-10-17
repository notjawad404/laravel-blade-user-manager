<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable; 

class UserProfile extends Model
{
    use HasFactory;

    protected $fillable = ['username', 'email', 'password'];


    // Hash password
    public function setPasswordAttributes($value){
        $this->attributes['password'] = bcrypt($value);
    }
}
