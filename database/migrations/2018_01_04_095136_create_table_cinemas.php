<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCinemas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cinemas', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('name', 50);
            $table->string('cinema_thumb', 100)->nullable();//картинка фильма
            $table->string('href', 500);
            $table->string('day', 15);
            $table->string('country_year', 25);
            $table->string('genre', 50)->nullable();
            $table->string('director', 40);
            $table->string('actors', 200);
            $table->string('in_ua', 20)->nullable();
            $table->string('in_world', 55)->nullable();
            $table->string('budget', 15)->nullable();
            $table->string('sum', 20)->nullable();
            $table->string('time', 15)->nullable();
            $table->string('description', 2000)->nullable();//описание фильма
            $table->string('frame_thumb_1', 150)->nullable();//кадр фильма
            $table->string('frame_thumb_2', 150)->nullable();//кадр фильма
            $table->string('frame_thumb_3', 150)->nullable();//кадр фильма
            $table->string('frame_thumb_4', 150)->nullable();//кадр фильма
            $table->string('frame_thumb_5', 150)->nullable();//кадр фильма
            $table->string('frame_thumb_6', 150)->nullable();//кадр фильма
            $table->mediumText('look')->nullable();//список кинотеатров
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
        Schema::dropIfExists('cinemas');
    }
}
