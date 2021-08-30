<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-27 10:25:32
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-27 10:58:36
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookAuthorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('book_authors', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('book_id');
            $table->unsignedSmallInteger('author_id');
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
        Schema::dropIfExists('book_authors');
    }
}
