<?php

namespace App\Models;
use App\Models\Note;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
     protected $fillable = [
    'note_id',
    'user_id',
    'content',
];
  public function note() {
        return $this->belongsTo(Note::class); // التعليق تابع لملاحظة
    }

    public function user() {
        return $this->belongsTo(User::class); // التعليق تابع لمستخدم (اختياري)
    }


}
