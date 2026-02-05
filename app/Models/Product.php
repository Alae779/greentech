<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'prix', 'category_id', 'description'];
    protected $guarded = ['id'];
    public $timestamps = false;

    public function category(){
        return $this->belongsTo(Category::class);
    }
    public function users(){
        return $this->belongsToMany(User::class, "favoris");
    }
}
