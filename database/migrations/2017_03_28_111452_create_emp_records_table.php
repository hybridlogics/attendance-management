<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmpRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emp_records', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->string('day',100);
            $table->string('month',100);
            $table->string('year',100);
            $table->string('punch_in',100)->nullable();
            $table->string('punch_out',100)->nullable();
            $table->string('duration',100)->nullable();
            $table->string('punch',10)->nullable();
            $table->string('status',10)->nullable();
            $table->nullableTimestamps();
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emp_records');
    }
}
