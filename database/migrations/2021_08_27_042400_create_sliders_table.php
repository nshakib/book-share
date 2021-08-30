<?php
/**
 * @Author: Md Nazmus Shakib
 * @Date:   2021-08-27 10:24:00
 * @Last Modified by:   Md Nazmus Shakib
 * @Last Modified time: 2021-08-27 10:33:50
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSlidersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sliders', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('image');
            $table->text('link')->nullable();
            $table->text('link_text')->nullable();
            $table->unsignedTinyInteger('priority')->default(1)->comment('Lower=Higher Priority');
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
        Schema::dropIfExists('sliders');
    }
}
