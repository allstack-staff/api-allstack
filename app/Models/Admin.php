<?php

namespace App\Models;

use App\Interfaces\UserInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Admin extends Authenticatable implements UserInterface
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
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
        return false;
    }

    public function isReviewer(): bool
    {
        return false;
    }

    public function isAdmin(): bool
    {
        return true;
    }
}
