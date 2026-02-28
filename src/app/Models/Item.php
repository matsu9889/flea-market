<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    public function purchase()
    {
        return $this->hasOne(Purchase::class);
    }

    public function listing()
    {
        return $this->hasOne(Listing::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    //いいね機能
    public function is_liked_by_auth_user()
    {
        return $this->favorites()->where('user_id', auth()->id())->exists();
    }

}


