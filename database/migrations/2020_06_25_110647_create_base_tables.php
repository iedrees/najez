<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();	// owner
            $table->foreignId('team_id')->nullable();	
            $table->string('name');
            $table->text('details')->nullable();
            $table->string('status', 50)->default('active');
            $table->string('color', 50)->default('teal')->nullable();
            $table->string('image')->nullable();
            $table->json('meta')->nullable();
            $table->softDeletes('deleted_at', 0);	
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
}
