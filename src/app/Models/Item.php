<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'price',
        'brand_name',
        'description',
        'img_url',
        'category',
        'condition',
    ];

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

    public function categories()
    {
        return $this->belongsToMany(\App\Models\Category::class);
    }

    //いいね機能
    public function is_liked_by_auth_user()
    {
        return $this->favorites()->where('user_id', auth()->id())->exists();
    }

    //表示変更
    public const CONDITIONS = [
        1 => '良好',
        2 => '目立った傷や汚れなし',
        3 => 'やや傷や汚れあり',
        4 => '状態が悪い',
    ];
}
