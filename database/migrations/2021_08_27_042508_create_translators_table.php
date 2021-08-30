<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-27 10:25:08
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-27 10:57:47
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTranslatorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translators', function (Blueprint $table) {
            $table->id();
            $table->unsignedSmallInteger('book_id');
            $table->string('name')->nullable();
            $table->string('link')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('translators');
    }
}
