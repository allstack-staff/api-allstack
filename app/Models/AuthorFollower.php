<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class AuthorFollower extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'author_id',
        'reader_id'
    ];
}
