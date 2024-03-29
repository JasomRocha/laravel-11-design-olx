<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;
    
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
    ];
    
    public function advertises(){
        return $this->hasMany(Advertise::class);
    }
}
