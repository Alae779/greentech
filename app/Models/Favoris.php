<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Favoris extends Model
{
    protected $fillable = ['user_id', 'product_id'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function favoris(){
        return $this->belongsToMany(User::class);
    }
}
