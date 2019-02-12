<?php

namespace App\Modules\Products\Models;

use App\Modules\Categories\Models\Category;
use App\Modules\Ingredients\Models\Ingredient;
use App\Modules\Options\Models\Option;
use Dimsav\Translatable\Translatable;
use Kalnoy\Nestedset\NodeTrait;
use ProVision\Administration\AdminModel;
use ProVision\Administration\Traits\RevisionableTrait;
use ProVision\Administration\Traits\ValidationTrait;
use ProVision\MediaManager\Traits\MediaManagerTrait;

class Product extends AdminModel {
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
     * @param $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query) {
        return $query->where($this->table . '.visible', 1);
    }

    public function scopeSpecial($query) {
        return $query->where($this->table . '.special', 1);
    }

    public function category() {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }

    public function options() {
        return $this->belongsToMany(Option::class, 'products_options', 'product_id', 'option_id')->withPivot('price', 'id');
    }

    public function ingredients() {
        return $this->belongsToMany(Ingredient::class, 'products_ingredients', 'product_id', 'ingredient_id')->active();
    }

    public function allergens() {
        return $this->belongsToMany(Ingredient::class, 'products_allergens', 'product_id', 'ingredient_id')->active();
    }

    public function getPrice($id = null) {

        $options = $this->options;
        if ($options->isEmpty()) {
            if ($this->price == 0) {
                return 0;
            }
            return $this->price;
        }


        if ($id) {
            $option = $options->where('pivot.id', $id)->first();
            if (!empty($option)) {
                return $option->pivot->price;
            }
        }

        $smallest_price = $options->first()->pivot->price;

        foreach ($options as $option) {
            if ($option->pivot->price < $smallest_price) {
                $smallest_price = $option->pivot->price;
            }
        }
        return $smallest_price;
    }
}
