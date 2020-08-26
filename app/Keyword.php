<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Keyword extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Get the documents that belong to the keyword.
     */
    public function documents()
    {
        return $this->hasMany('App\Document');
    }
}
