<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicineHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medicine_histories', function (Blueprint $table) {
            $table->id();
            $table->integer('medical_history_id')->unsigned();
            $table->text('medicine_name');
            $table->text('power');
            $table->integer('amount');
            $table->text('shift');
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
        Schema::dropIfExists('medicine_histories');
    }
}
