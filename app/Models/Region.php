<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Region extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    use SoftDeletes;
    public function pays(){
        return $this->belongsToMany(Pays::class)->withPivot('adhesion');
    }
}
