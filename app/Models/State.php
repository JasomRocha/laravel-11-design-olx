<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    public $timestamps = false;
    
    protected $fillable = [
        'name',
        'slug'
    ];

    public function advertises(){
        return $this->hasMany(Advertise::class);
    }
    public function user(){
        return $this->hasMany(User::class);
    }
}
