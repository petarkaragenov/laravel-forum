<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Question;

class Answer extends Model
{
    protected $fillable = ['body', 'user_id'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function question() {
        return $this->belongsTo(Question::class);
    }

    public function getBodyHtmlAttribute() {
        return \Parsedown::instance()->text($this->body); //convert markdown to html
    }

    public function getCreatedDateAttribute() {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute() {
        return $this->id == $this->question->best_answer_id ? 'vote-accepted' : '';
    }

    public static function boot() {
        parent::boot();

        static::created(function($answer) {
            $answer->question->increment('answers_count');
        });

        static::deleted(function($answer) {
            $question = $answer->question;
            $answer->question->decrement('answers_count');
            if ($question->best_answer_id == $answer_id) {
                $question->best_answer_id = NULL;
                $question->save();
            }
        });
    }
}
