<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-20 21:09:51
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-30 10:37:15
 */

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
            $table->id();
            $table->string('name',50);
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->unsignedSmallInteger('parent_id')->nullable();
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
        Schema::dropIfExists('categories');
    }
}
