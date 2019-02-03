<?php

namespace App\Modules\Categories\Models;

use App\Modules\Products\Models\Product;
use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kalnoy\Nestedset\NodeTrait;
use ProVision\Administration\AdminModel;
use ProVision\Administration\Traits\RevisionableTrait;
use ProVision\Administration\Traits\ValidationTrait;
use ProVision\MediaManager\Traits\MediaManagerTrait;

class Category extends AdminModel {
    use NodeTrait, MediaManagerTrait, ValidationTrait, Translatable, RevisionableTrait, SoftDeletes;

    public $translationForeignKey = 'category_id';
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
    protected $table = 'categories';
    /**
     * @var array
     */
    protected $fillable = [
        'visible',
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
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where($this->table . '.visible', 1);
    }

    public function products() {
        return $this->hasMany(Product::class, 'category_id', 'id');
    }

    public function header_media()
    {
        return $this->media('header');
    }
}
