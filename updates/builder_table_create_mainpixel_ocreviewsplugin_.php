<?php namespace Mainpixel\OcReviewsPlugin\Updates;

use Schema;
use October\Rain\Database\Updates\Migration;

class BuilderTableCreateMainpixelOcreviewsplugin extends Migration
{
    public function up()
    {
        Schema::create('mainpixel_ocreviewsplugin_', function($table)
        {
            $table->engine = 'InnoDB';
            $table->increments('id')->unsigned();
            $table->string('title', 255)->nullable();
            $table->string('email', 255)->nullable();
            $table->text('review');
            $table->integer('published');
            $table->timestamps();
        });
    }
    
    public function down()
    {
        Schema::dropIfExists('mainpixel_ocreviewsplugin_');
    }
}
