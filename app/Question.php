<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\User;

class Question extends Model
{
    protected $fillable = ['title', 'body'];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value); // set a dependant value of an attribute
    }

    public function getUrlAttribute() {
        return route("questions.show", $this->slug); // modify existing attributes
    }

    public function getCreatedDateAttribute() {
        return $this->created_at->diffForHumans();
    }

    public function getPartialTextAttribute() {
        return Str::limit($this->body, 250);
    }

    public function getStatusAttribute() {
        if ($this->answers > 0) {
            if ($this->best_answer_id) {
                return "answer-accepted";
            }
            return "answered";
        }
        return "unanswered";
    }

    public function getBodyHtmlAttribute() {
        return \Parsedown::instance()->text($this->body); //convert markdown to html
    }
}
