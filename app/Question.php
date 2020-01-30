<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Question extends Model
{

    protected $fillable = ['title', 'body'];

    public function user() {
        return $this->belongsTo(User::class);
    }
    /**
     * Function str_slug has been removed on version 6.0
     * Options are install helper package through composer or
     * Use Laravel facade:
     *      use Illuminate\Support\Str;
     *      Str::slug($string);
     */
    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function getUrlAttribute()
    {
        // return route('questions.show', $this->id);
        return '#';
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->DiffForHumans();
    }

    public function getStatusAttribute()
    {
        if ($this->answers > 0) {
            if($this->best_answer_id) {
                return "answered-accepted";
            }
            return "answered";
        }

        return "unanswered";
    }
}
