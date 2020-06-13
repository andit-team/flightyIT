<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('parent_id')->default(0);
            $table->enum('post_type',['Page','Post'])->default('Page');
            $table->string('menu_name')->nullable();
            $table->string('post_title')->nullable();
            $table->string('post_url')->nullable();
            $table->string('content')->nullable();
            $table->string('seo_title')->nullable();
            $table->text('seo_keyword')->nullable();
            $table->text('seo_description')->nullable();
            $table->string('thumb')->nullable();
            $table->string('template')->nullable();
            $table->enum('status',['Draft','Publish','Trash'])->default('Draft');
            $table->integer('page_order')->default(0);

            $table->unsignedBigInteger('user_id')->default(1);
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cms');
    }
}
