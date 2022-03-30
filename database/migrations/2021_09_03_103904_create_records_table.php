<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {
            $table->id();
            $table->string('ir_no');
            $table->date('date_received');
            $table->date('date_occurred');
            $table->string('informant');
            $table->string('offence');
            $table->string('accussed');
            $table->text('brief');
            $table->string('currency');
            $table->text('case_position');
            $table->string('loss_type');
            $table->string('officer');
            $table->integer('value');
            $table->integer('zwlEquivalent');
            $table->integer('bank_rate');
            $table->boolean('ReviewedByManager')->default(false);
            $table->boolean('ReviewedByHOD')->default(false);
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
        Schema::dropIfExists('records');
    }
}
