<?php

namespace App\Models;
use App\Models\Note;
use Illuminate\Database\Eloquent\Model;

class SubNote extends Model
{
    protected $fillable =
    [
        'title',
        'note_id',
    ];

 public function note()
{
    return $this->belongsTo(Note::class);
}


   
}
