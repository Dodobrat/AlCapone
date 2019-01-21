<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Index\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Blog\Models\Blog;
use App\Modules\Fitnesses\Models\Fitness;
use App\Modules\News\Models\News;
use App\Modules\Sliders\Models\Slider;
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



        return view('index::front.index');
    }

}
