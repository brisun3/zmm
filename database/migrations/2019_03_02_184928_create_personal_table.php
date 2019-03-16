<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal', function (Blueprint $table) {
            $table->increments('id');
            $table->string('tel');
            $table->text('addr1');
            $table->string('img0');
            $table->string('img1');
            $table->string('img2');
            $table->string('img3');
            $table->string('img4');
            $table->string('img5');
            $table->string('img6');
            $table->string('img7');
            $table->string('img8');
            $table->string('img9');
            $table->text('addr2');
            $table->text('intro');
            $table->string('age');
            $table->string('national');
            $table->string('shape');
            $table->text('skin');
            $table->text('height');
            $table->string('chest');
            $table->string('waist');
            $table->string('weight');
            $table->string('lan1');
            $table->string('lan2');
            $table->integer('price30');
            $table->integer('price1h');
            $table->integer('price_out');
            $table->text('price_note');
            $table->text('service_des');
            $table->text('special_serv');
            $table->boolean('western_serv');
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
        Schema::dropIfExists('personal');
    }
}
