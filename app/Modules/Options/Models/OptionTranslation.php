<?php

namespace App\Modules\Options\Models;

use ProVision\Administration\AdminModelTranslations;
use ProVision\Administration\Traits\RevisionableTrait;

class OptionTranslation extends AdminModelTranslations {
    use RevisionableTrait;

    protected $table = 'options_translations';

    public $timestamps = false;
    protected $fillable = [
        'title',
    ];


}
