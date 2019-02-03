<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

namespace App\Modules\Blog\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Libraries\Redirector;
use App\Modules\Blog\Models\Blog;
use App\Modules\Blog\Models\BlogCategories;
use App\Modules\Blog\Models\BlogTranslation;
use Illuminate\Support\Facades\Request;
use ProVision\Administration\Facades\Settings;
use SEO;
use Venturecraft\Revisionable\Revision;


class BlogController extends Controller {

    public function index() {
        //Set SEO
        SEO::setTitle(Settings::getLocale('blog_meta_title'));
        SEO::setDescription(Settings::getLocale('blog_meta_description'));
        SEO::metatags()->addMeta(Settings::getLocale('blog_meta_keywords'));
        SEO::opengraph()->setUrl(route('blog.index'));
        SEO::opengraph()->setSiteName(Settings::getLocale('blog_meta_title'));
        SEO::setCanonical(route('blog.index'));
        SEO::opengraph();
        SEO::twitter();
        SEO::metatags()->addMeta('author', 'ProVision.BG');
        SEO::opengraph()->addImage(asset('assets/images/facebook_share.jpg'), [
            'height' => 630,
            'width' => 1200
        ]);

        if (Request::has('page')) {
            SEO::metatags()->addMeta('robots', 'noindex, follow');
        }



        $news = Blog::active()->reversed()->with(['media'])->paginate(6);


        \Breadcrumbs::register('index', function ($breadcrumbs) {
            $breadcrumbs->parent('index_home');
            $breadcrumbs->push(Settings::getLocale('blog_title'), route('blog.index'));
        });


        return view('blog::front.index', compact( 'news'));
    }

    public function view($slug) {

        $blog = Blog::whereHas('translations', function ($query) use ($slug) {
            $query->where('locale', \Administration::getLanguage())
                ->where('slug', $slug);
        })->with([
                'media',
                'header_media',
            ]
        )
            ->active()
            ->first();



        if (empty($blog)) {
            return redirect()
                ->route('blog.index')
                ->withErrors([
                    trans('blog::front.article_not_found')
                ]);
        }


        //Set SEO
        SEO::setTitle($blog->meta_title);
        SEO::setDescription($blog->meta_description);
        SEO::metatags()->addMeta('keywords', $blog->meta_keyword);
        SEO::opengraph()->setUrl(route('blog.view', ['slug' => $blog->slug]));
        SEO::opengraph()->setSiteName($blog->title);
        SEO::setCanonical(route('blog.view', ['slug' => $blog->slug]));
        SEO::opengraph();
        SEO::twitter();
        SEO::metatags()->addMeta('author', 'ProVision.BG');
        $image = asset('assets/images/facebook_share.jpg');
        if (!$blog->media->isEmpty()) {
            foreach ($blog->media as $media) {
                SEO::addImages($media->getPublicPath());
            }
        } else {
            SEO::opengraph()->addImage($image, ['height' => 1200, 'width' => 630]);
        }

        SEO::opengraph()->setTitle($blog->title)
            ->setDescription($blog->meta_description);

        \Breadcrumbs::register('index', function ($breadcrumbs) use ($blog) {
            $breadcrumbs->parent('index_home');
            $breadcrumbs->push(Settings::getLocale('blog_title'), route('blog.index'));
            $breadcrumbs->push($blog->title, route('blog.view', ['slug' => $blog->slug]));
        });

        return view('blog::front.view', compact('blog'));
    }

}
