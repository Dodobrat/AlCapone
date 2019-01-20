<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Kalnoy\Nestedset\NestedSet;

class CreateBlogTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('blog', function (Blueprint $table) {
            $table->increments('id');
            $table->boolean('visible')->default(true);
            $table->boolean('show_media')->default(true)->comment('Дали да показва медиата в прегледа на страницата'); //Дали да показва медиата в прегледа на страницата
            NestedSet::columns($table);
            $table->timestamps();

        });

        Schema::create('blog_translations', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('blog_id')->unsigned();
            $table->string('title');
            $table->string('meta_title')->nullable()->default(null);
            $table->string('meta_description')->nullable()->default(null);
            $table->string('meta_keywords')->nullable()->default(null);
            $table->string('slug');
            $table->longText('description')->nullable()->default(null);
            $table->string('locale')->index();
            $table->unique([
                'blog_id',
                'locale',
            ]);

            $table->foreign('blog_id')->references('id')->on('blog')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('blog');
        Schema::drop('blog_translations');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
