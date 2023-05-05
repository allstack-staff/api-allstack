<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PublicationReviewer extends Model
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'publication_id',
        'reviewer_id',
    ];
}
