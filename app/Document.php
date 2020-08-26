<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Get the categories that belong to the document.
     */
    public function categories()
    {
        return $this->hasMany('App\Category');
    }

    /**
     * Get the keywords that belong to the document.
     */
    public function keywords()
    {
        return $this->hasMany('App\Keyword');
    }
}
