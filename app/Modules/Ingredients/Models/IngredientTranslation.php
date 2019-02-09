<?php

namespace App\Modules\Ingredients\Models;

use ProVision\Administration\AdminModelTranslations;
use ProVision\Administration\Traits\RevisionableTrait;

class IngredientTranslation extends AdminModelTranslations {
    use RevisionableTrait;

    protected $table = 'ingredients_translations';

    public $timestamps = false;
    protected $fillable = [
        'title'
    ];
}
