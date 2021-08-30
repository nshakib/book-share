<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-27 10:54:47
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-27 11:01:40
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('book_id');
            $table->unsignedSmallInteger('tag_id');
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
        Schema::dropIfExists('book_tags');
    }
}
