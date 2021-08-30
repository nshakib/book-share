<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-27 10:24:56
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-28 09:17:32
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBooksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('isbn')->nullable();
            $table->string('publish_year')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();


            $table->boolean('is_approved')->default(0);
            $table->unsignedSmallInteger('total_view')->default(0);
            $table->unsignedSmallInteger('total_search')->default(0);
            $table->unsignedSmallInteger('total_borrowed')->default(0);
            $table->unsignedSmallInteger('user_id')->nullable()->index();

            $table->unsignedSmallInteger('category_id')->index();
            $table->unsignedSmallInteger('publisher_id')->index();
            $table->unsignedSmallInteger('translator_id')->nullable()->index();
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
        Schema::dropIfExists('books');
    }
}
