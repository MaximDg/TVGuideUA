<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFilms extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('films', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 100);
            $table->string('data', 9);
            $table->string('start', 5);
            $table->string('finish', 5);
            $table->integer('channal_id')->unsigned();
            //$table->foreign('channal_id')->references('id')->on('channals');// связываем колонку кетигори_айди с колонкой айди таблицы 'categories' (если есть .._id надо связывать). Для того чтобы нельзя было записать не существующее айди. В итоге не связываю, так как надо будет полностью очищать таблицу, связь это го сделать не дает
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
        Schema::dropIfExists('films');
    }
}
