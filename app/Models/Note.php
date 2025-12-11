<?php

namespace App\Models;
use App\Models\SubNote;

use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
 protected $fillable = [
    'title',
    'desc',
    'is_checked',
    'user_id',
];

 public function subNote()
 {
    return $this->hasMany(subNote::class);
 }
 
 public function user()
{
    return $this->belongsTo(User::class);
}


}

