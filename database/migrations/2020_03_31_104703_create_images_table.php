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
            $table->foreignId('comic_id')->constrained();
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
            ['comic_id' => '2' , 'image_name' => 'FMA1.jpg', 'size' => '175.75 Kb' ,'format' => 'jpg', 'cover' => '1' ],
            ['comic_id' => '2' , 'image_name' => 'FMA1b.jpg', 'size' => '138.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '2' , 'image_name' => 'FMA1c.jpg', 'size' => '203.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '2' , 'image_name' => 'FMA1d.jpg', 'size' => '201.90 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '3' , 'image_name' => 'FMA1.jpg', 'size' => '175.75 Kb' ,'format' => 'jpg', 'cover' => '1' ],
            ['comic_id' => '3' , 'image_name' => 'FMA1b.jpg', 'size' => '138.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '3' , 'image_name' => 'FMA1c.jpg', 'size' => '203.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '3' , 'image_name' => 'FMA1d.jpg', 'size' => '201.90 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '4' , 'image_name' => 'FMA1.jpg', 'size' => '175.75 Kb' ,'format' => 'jpg', 'cover' => '1' ],
            ['comic_id' => '4' , 'image_name' => 'FMA1b.jpg', 'size' => '138.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '4' , 'image_name' => 'FMA1c.jpg', 'size' => '203.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '4' , 'image_name' => 'FMA1d.jpg', 'size' => '201.90 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '5' , 'image_name' => 'FMA1.jpg', 'size' => '175.75 Kb' ,'format' => 'jpg', 'cover' => '1' ],
            ['comic_id' => '5' , 'image_name' => 'FMA1b.jpg', 'size' => '138.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '5' , 'image_name' => 'FMA1c.jpg', 'size' => '203.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '5' , 'image_name' => 'FMA1d.jpg', 'size' => '201.90 Kb' ,'format' => 'jpg', 'cover' => '0' ],
        ['comic_id' => '6' , 'image_name' => 'FMA1.jpg', 'size' => '175.75 Kb' ,'format' => 'jpg', 'cover' => '1' ],
            ['comic_id' => '6' , 'image_name' => 'FMA1b.jpg', 'size' => '138.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '6' , 'image_name' => 'FMA1c.jpg', 'size' => '203.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '6' , 'image_name' => 'FMA1d.jpg', 'size' => '201.90 Kb' ,'format' => 'jpg', 'cover' => '0' ],
           ['comic_id' => '7' , 'image_name' => 'FMA1.jpg', 'size' => '175.75 Kb' ,'format' => 'jpg', 'cover' => '1' ],
            ['comic_id' => '7' , 'image_name' => 'FMA1b.jpg', 'size' => '138.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '7' , 'image_name' => 'FMA1c.jpg', 'size' => '203.50 Kb' ,'format' => 'jpg', 'cover' => '0' ],
            ['comic_id' => '7' , 'image_name' => 'FMA1d.jpg', 'size' => '201.90 Kb' ,'format' => 'jpg', 'cover' => '0' ],
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
