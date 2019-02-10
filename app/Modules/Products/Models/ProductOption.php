<?php

namespace App\Modules\Products\Models;

use App\Modules\Options\Models\Option;
use Illuminate\Database\Eloquent\Model;

class ProductOption extends Model
{
    protected $table = 'products_options';

    public function option() {
        return $this->hasOne(Option::class, 'id', 'option_id');
    }

}
