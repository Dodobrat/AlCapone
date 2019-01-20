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

    public function index($slug = null) {
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

        $news_categories = BlogCategories::active()->reversed()
            ->whereHas('news')->get();

        $news = Blog::active()->reversed()->with(['media', 'category']);
        $category = null;

        if (!empty($slug)) {
            $category = BlogCategories::whereTranslation('slug', $slug)->active()->first();
            $news = $news->whereHas('category', function ($q) use ($slug) {
                return $q->whereTranslation('slug', $slug)->active();
            });
        } else {
            $news = $news->whereHas('category', function ($q) use ($slug) {
                return $q->active();
            });
        }
        $news = $news->paginate();


        \Breadcrumbs::register('index', function ($breadcrumbs) {
            $breadcrumbs->parent('index_home');
            $breadcrumbs->push(Settings::getLocale('blog_title'), route('blog.index'));
        });


        return view('blog::front.index', compact('news_categories', 'news', 'category'));
    }

    public function view($slug) {

        $blog = Blog::whereHas('translations', function ($query) use ($slug) {
            $query->where('locale', \Administration::getLanguage())
                ->where('slug', $slug);
        })->with([
                'media',
                'header_media',
                'category',
            ]
        )
            ->active()
            ->first();



        if (empty($blog)) {
            /**
             * Има ли създаден РЪЧЕН редирект ?
             * @var Redirector $redirector
             */
            $redirector = new Redirector(Request::getRequestUri());
            if ($redirector->hasRedirect()) {
                return $redirector->doRedirect();
            }

            /*
             * Дали няма сменян slug?
             */
            $fallback = Revision::with(['revisionable'])
                ->where('revisionable_type', BlogTranslation::class)
                ->where('key', 'slug')
                ->whereNotNull('old_value')
                ->where(function ($q) use ($slug) {
                    $q->where('old_value', $slug)->orWhere('new_value', $slug);
                })
                ->orderBy('id', 'desc')
                ->first();

            if ($fallback && $fallback->revisionable) {
                $red_model = Blog::whereTranslation('slug', $fallback->revisionable->slug)->first();

                if ($red_model) {
                    return redirect()->route('blog.view', $red_model->slug, 301);
                }
            }

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

        $similar_article = Blog::inRandomOrder()->active()->whereHas('category', function ($q) use ($slug) {
            return $q->active();
        })->where('id', '!=', $blog->id)->first();

        SEO::opengraph()->setTitle($blog->title)
            ->setDescription($blog->meta_description);

        \Breadcrumbs::register('index', function ($breadcrumbs) use ($blog) {
            $breadcrumbs->parent('index_home');
            $breadcrumbs->push(Settings::getLocale('blog_title'), route('blog.index'));
            $breadcrumbs->push($blog->title, route('blog.view', ['slug' => $blog->slug]));
        });

        return view('blog::front.view', compact('blog', 'similar_article'));
    }

}
