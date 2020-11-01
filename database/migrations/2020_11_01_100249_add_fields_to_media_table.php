<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsToMediaTable extends Migration
{
    public function up()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->uuid('uuid')->nullable()->after('id');
            $table->string('conversions_disk')->nullable()->after('uuid');
        });
    }

    public function down()
    {
        Schema::table('media', function (Blueprint $table) {
            $table->dropColumn('uuid');
            $table->dropColumn('conversions_disk');
        });
    }
}
