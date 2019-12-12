<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCampaignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('campaigns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->longText('description');
            $table->unsignedDecimal('expectedrevenue', 10, 2);
            $table->unsignedDecimal('currentrevenue', 10, 2)->default(0);
            $table->string('status');
            $table->unsignedBigInteger('beginning_month')->default(0);
            $table->unsignedBigInteger('beginning_year')->default(0);
            $table->unsignedBigInteger('ending_month')->default(0);
            $table->unsignedBigInteger('ending_year')->default(0);
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
        Schema::dropIfExists('campaigns');
    }
}
