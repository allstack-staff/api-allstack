<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Author extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'bio',
        'password',
    ];

    protected $hidden = [
        'password',
    ];

    public function isReader(): bool
    {
        return false;
    }

    public function isAuthor(): bool
    {
        return true;
    }

    public function isReviewer(): bool
    {
        return false;
    }

    public function isAdmin(): bool
    {
        return false;
    }
}
