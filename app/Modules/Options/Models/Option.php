<?php

namespace App\Modules\Options\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;
use ProVision\Administration\Traits\RevisionableTrait;
use ProVision\Administration\Traits\ValidationTrait;

class Option extends Model {
    use ValidationTrait, Translatable, RevisionableTrait, NodeTrait;

    public $translationForeignKey = 'option_id';
    /**
     * @var array
     */
    public $translatedAttributes = [
        'title',
    ];
    protected $table = 'options';
    /**
     * @var array
     */
    protected $fillable = [];


    protected $with = ['translations'];


}
