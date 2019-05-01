<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lectures', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('subject_category_id')->unsigned();
            $table->string('title');
            $table->text('content');
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('lectures', function($table)
        {
            $table->foreign('subject_category_id')
                ->references('id')->on('lectures')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lectures');
    }
}
