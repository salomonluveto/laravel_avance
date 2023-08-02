<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    use HasFactory;
    protected $fillable = ['name','capital'];
    public function regions(){
        return $this->belongsToMany(Region::class)->withPivot('adhesion');
    }
}
