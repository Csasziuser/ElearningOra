<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Score extends Model
{
    use SoftDeletes;

    protected $fillable = ['e-mail', 'subject_id', 'score'];

    public function subject(){
        return $this->belongsTo(Subject::class);
    }
}
