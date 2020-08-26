<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Get the documents that belong to the category.
     */
    public function documents()
    {
        return $this->hasMany('App\Document');
    }
}
