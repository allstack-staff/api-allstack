<?php

namespace App\Interfaces;

interface UserInterface
{
    public function isReader(): bool;
    public function isAuthor(): bool;
    public function isReviewer(): bool;
    public function isAdmin(): bool;
}
