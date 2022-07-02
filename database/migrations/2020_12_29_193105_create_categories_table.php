<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->nullable();
            $table->string('name_ar')->nullable();
            $table->string('slug')->nullable();
            $table->string('slug_ar')->nullable();
            $table->integer('status')->nullable()->default(1);
            $table->string('photo')->nullable();
            $table->integer('is_featured')->nullable()->default(0);
            $table->string('image')->nullable();
            $table->string('rand')->nullable();
            $table->string('title')->nullable();
            $table->string('title_ar')->nullable();
            $table->text('meta_tag')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_description_ar')->nullable();
            $table->text('tags')->nullable();
            $table->text('tags_ar')->nullable();
            $table->text('details')->nullable();
            $table->text('details_ar')->nullable();
            $table->softDeletes();
             $table->integer('erp_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
