<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Answer extends Model
{
    use SoftDeletes;

    protected $fillable = ['answer_text', 'is_correct', 'question_id'];

    public function question(){
        return $this->belongsTo(Question::class);
    }
}
