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
            $table->string('status', 100)->default('active');
            $table->string('color', 20)->default('teal')->nullable();
            $table->string('image')->nullable();
            $table->json('meta')->nullable();
            $table->date('deadline')->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
        });

        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();	// owner / created by
            $table->foreignId('project_id')->nullable();
            $table->foreignId('parent_id')->nullable();
            $table->text('task');
            $table->text('details')->nullable();
            $table->string('status', 100)->default('active');
            $table->boolean('done')->default(false);
            $table->json('meta')->nullable();
            $table->timestamp('due_date')->nullable();
            $table->softDeletes('deleted_at', 0);
            $table->timestamps();
        });

        Schema::create('project_members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('project_id')->nullable();
            $table->string('rule', 100)->default('member');
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
        Schema::dropIfExists('tasks');
        Schema::dropIfExists('user_project');
    }
}
