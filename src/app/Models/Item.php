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
}


