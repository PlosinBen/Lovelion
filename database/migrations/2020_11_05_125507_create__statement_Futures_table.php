<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatementFuturesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statement_futures', function (Blueprint $table) {
            $table->id();
            $table->date('period');
            $table->mediumInteger('commitment')->comment('期末權益');
            $table->mediumInteger('open_interest')->comment('未平倉損益');
            $table->mediumInteger('profit')->comment('沖銷損益');
            $table->mediumInteger('oversea_commitment')->comment('海期權益');

            $table->mediumInteger('real_commitment')->default(0)->comment('權益淨值');
            $table->mediumInteger('net_commitment')->default(0)->comment('權益變動');
            $table->mediumInteger('distribution')->default(0)->comment('可分配總額');
            $table->string('note')->default('')->comment('備註');
            $table->timestamps();

            $table->index('period');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statement_futures');
    }
}
