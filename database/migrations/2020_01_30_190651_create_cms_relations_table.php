<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCmsRelationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cms_relations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('menu_id')->default(0);//opt_id
            $table->integer('parent')->default(0);
            $table->integer('page_id')->default(0);//obj_id
            $table->integer('is_login')->default(0);
            $table->integer('order')->default(0);
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
        Schema::dropIfExists('cms_relations');
    }
}
