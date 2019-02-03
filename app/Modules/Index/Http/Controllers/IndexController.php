<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Index\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Products\Models\Product;
use ProVision\Administration\Facades\Settings;
use SEO;

class IndexController extends Controller {
    public function index() {
        //Set SEO
        SEO::setTitle(Settings::getLocale('meta_title'));
        SEO::setDescription(Settings::getLocale('meta_description'));
        SEO::metatags()->addMeta('keywords', Settings::getLocale('meta_keywords'));
        SEO::opengraph()->setUrl(route('index'));
        SEO::opengraph()->setSiteName(Settings::getLocale('meta_title'));
        SEO::setCanonical(route('index'));
        SEO::opengraph();
        SEO::twitter();
        SEO::metatags()->addMeta('author', 'ProVision.BG');
        SEO::opengraph()->addImage(asset('assets/images/facebook_share.jpg'), ['height' => 1200, 'width' => 630]);


        $meals = Product::active()->with(['media'])->limit(8)->get();

        return view('index::front.index', compact('meals'));
    }

}
