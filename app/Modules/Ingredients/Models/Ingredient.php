<?php

namespace App\Modules\Ingredients\Models;

use Dimsav\Translatable\Translatable;
use ProVision\Administration\AdminModel;
use ProVision\Administration\Traits\RevisionableTrait;

class Ingredient extends AdminModel {
    use Translatable, RevisionableTrait;

    public $translationForeignKey = 'ingredient_id';
    /**
     * @var array
     */
    public $translatedAttributes = [
        'title',
    ];
    protected $table = 'ingredients';
    /**
     * @var array
     */
    protected $fillable = [
        'visible'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'visible' => 'boolean',
    ];

    protected $with = ['translations'];


    /**
     * Scope a query to only include active users.
     *
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query) {
        return $query->where($this->table . '.visible', 1);
    }
}
