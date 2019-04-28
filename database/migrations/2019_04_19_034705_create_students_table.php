<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Model\UserType;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->string('student_id', 100)->unique();
            $table->string('first_name', 500);
            $table->string('middle_name', 500)->nullable();
            $table->string('last_name', 500);
            $table->text('address');
            $table->string('contact_number', 100);
            $table->string('gender', 100);
            $table->string('year', 100);
            $table->string('section', 100);
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('students', function($table)
        {
            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });

        UserType::create(['name' => 'admin']);
        UserType::create(['name' => 'student']);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
}
