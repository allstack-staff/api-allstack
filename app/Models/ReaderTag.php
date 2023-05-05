<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class ReaderTag extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'reader_id',
        'tag_id',
    ];
}
