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
    protected $fillable = ['name', 'color'];

    /**
     * Get the documents that belong to the keyword.
     */
    public function documents()
    {
        return $this->belongsToMany('App\Document');
    }
}
