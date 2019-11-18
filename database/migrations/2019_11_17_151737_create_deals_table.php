<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('companyName');
            $table->string('companyType');
            $table->string('companyIndustry');
            $table->string('companyAddress');
            $table->string('companyTel');
            $table->string('companyEmail');
            $table->string('raisedAmount');
            $table->string('image');
            $table->text('DealDetailedDesc');
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
        Schema::dropIfExists('deals');
    }
}
