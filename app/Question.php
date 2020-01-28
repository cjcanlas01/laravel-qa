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
}
