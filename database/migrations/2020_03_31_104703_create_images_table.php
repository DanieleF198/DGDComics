<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id')->unique();
            $table->foreignId('comic_id')->constrained()->cascadeOnDelete();
            $table->text('image_name');
            $table->text('size');
            $table->text('format');
            $table->boolean('cover');
        });
        DB::table('images')->insert([
            ['comic_id' => '1' , 'image_name' => 'FMA1.jpg', 'size' => '175.75 Kb' ,'format' => 'jpg', 'cover' => '1' ],
            ['comic_id' => '1' , 'image_name' => 'FMA1b.jpg', 'size' => '138.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '1' , 'image_name' => 'FMA1c.jpg', 'size' => '203.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '1' , 'image_name' => 'FMA1d.jpg', 'size' => '201.90 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '2' , 'image_name' => 'IoSonoIronMan.jpg', 'size' => '141 Kb' ,'format' => 'jpg', 'cover' => '1' ],
            ['comic_id' => '3' , 'image_name' => 'T3219.jpg', 'size' => '194 Kb' ,'format' => 'jpg', 'cover' => '1' ],
            ['comic_id' => '4' , 'image_name' => 'Pippo.jpg', 'size' => '74.9 Kb' ,'format' => 'jpg', 'cover' => '1' ],
            ['comic_id' => '5' , 'image_name' => 'SM1.jpg', 'size' => '132 Kb' ,'format' => 'jpg', 'cover' => '1' ],
            ['comic_id' => '6' , 'image_name' => 'BM1.jpg', 'size' => '84.9 Kb' ,'format' => 'jpg', 'cover' => '1' ],
           ['comic_id' => '7' , 'image_name' => 'F1.jpg', 'size' => '367 Kb' ,'format' => 'jpg', 'cover' => '1' ],

            ['comic_id' => '8' , 'image_name' => 'OP1.jpg' , 'size' => '265 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '9' , 'image_name' => 'OP2.jpg' , 'size' => '74.9 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '10' , 'image_name' => 'OP3.jpg' , 'size' => '281 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '11' , 'image_name' => 'OP4.jpg' , 'size' => '47 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '12' , 'image_name' => 'OP5.jpg' , 'size' => '81.3 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '13' , 'image_name' => 'H1.jpg' , 'size' => '480 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '14' , 'image_name' => 'T1.jpg' , 'size' => '196 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '15' , 'image_name' => 'ZCpizze.jpg' , 'size' => '54.1 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '16' , 'image_name' => 'T3286.jpg' , 'size' => '116 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '17' , 'image_name' => 'T3287.jpg' , 'size' => '208 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '18' , 'image_name' => 'T3288.jpg' , 'size' => '238 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '19' , 'image_name' => 'TWD1.jpg' , 'size' => '57.5 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '20' , 'image_name' => 'TWD2.jpg' , 'size' => '101 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '21' , 'image_name' => 'TWD3.jpg' , 'size' => '570 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '22' , 'image_name' => 'TWD4.jpg' , 'size' => '63.5 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '23' , 'image_name' => 'TWD5.jpg' , 'size' => '69.5 kb' , 'format' => 'jpg' , 'cover' => '1'],
            ['comic_id' => '24' , 'image_name' => 'TWD6.jpg' , 'size' => '51.6 kb' , 'format' => 'jpg' , 'cover' => '1'],
        ]); }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
