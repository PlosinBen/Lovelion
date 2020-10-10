<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLedgerRecordDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ledger_record_detail', function (Blueprint $table) {
            $table->id();
            $table->integer('ledger_record_id')->unsigned();
            $table->string('name');
            $table->decimal('unit', 10, 2);
            $table->smallInteger('quantity')->unsigned();
            $table->decimal('other', 10, 2);
            $table->decimal('subtotal', 10, 2);
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
        Schema::dropIfExists('ledger_record_detail');
    }
}
