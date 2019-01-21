<?php
/**
 * Copyright (c) 2019. ProVision Media Group Ltd. <http://provision.bg>
 * Venelin Iliev <http://veneliniliev.com>
 */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function($table) {
            $table->decimal('lat', 10, 8)->nullable()->default(NULL);
            $table->decimal('long', 10, 8)->nullable()->default(NULL);
            $table->text('phone')->nullable()->default(NULL);
        });

        Schema::table('contacts_translations', function($table) {
            $table->text('address')->nullable()->default(NULL);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function($table) {
            $table->dropColumn('lat');
            $table->dropColumn('long');
            $table->dropColumn('phone');
        });

        Schema::table('contacts_translations', function($table) {
            $table->dropColumn('address');
        });
    }
}
