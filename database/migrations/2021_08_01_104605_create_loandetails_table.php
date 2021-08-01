<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoandetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loandetails', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('loan_id');
            $table->float('total_amount');
            $table->string('payment_date', 40);            
            $table->string('payment_end_date', 40);
            $table->timestamps();
            $table->integer('updated_by');
            $table->tinyInteger('status')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loandetails');
    }
}
