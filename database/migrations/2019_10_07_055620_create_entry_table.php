<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('drawings_or_paye');
            $table->string('is_more_than_three_years');
            $table->smallInteger('years_in_business');
            $table->string('work_type');
            $table->smallInteger('number_of_staff');
            $table->string('on_tools');
            $table->string('other_not_on_tools');
            $table->integer('income');
            $table->string('payment_frequency');
            $table->string('acc_cover_plan');
            $table->integer('cover_plus_extra_cover_amount');
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
        Schema::dropIfExists('entries');
    }
}
