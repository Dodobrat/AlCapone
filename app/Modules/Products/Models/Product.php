<?php

namespace App\Modules\Products\Models;

use App\Modules\Categories\Models\Category;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use ProVision\Administration\Traits\RevisionableTrait;
use ProVision\Administration\Traits\ValidationTrait;
use ProVision\MediaManager\Traits\MediaManagerTrait;

class Product extends Model {
    use NodeTrait, MediaManagerTrait, ValidationTrait, Translatable, RevisionableTrait;

    public $translationForeignKey = 'product_id';
    /**
     * @var array
     */
    public $translatedAttributes = [
        'title',
        'description',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'slug',
    ];
    protected $table = 'products';
    /**
     * @var array
     */
    protected $fillable = [
        'visible', 'special', 'category_id', 'price'
    ];
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'visible' => 'boolean',
        'special' => 'boolean',
    ];

    protected $with = ['translations'];


    /**
     * Scope a query to only include active users.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query) {
        return $query->where($this->table . '.visible', 1);
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function getPrice() {
        return currency($this->price);
    }
}
