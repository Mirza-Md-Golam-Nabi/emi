<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('customer_name', 200);
            $table->string('customer_mobile', 20);
            $table->float('amount', 20, 2);
            $table->string('duration', 100);
            $table->float('interest_rate', 20, 2);
            $table->float('total_interest', 20, 2);
            $table->float('monthly_interest', 20, 2);
            $table->float('monthly_principal', 20, 2);
            $table->float('total_emi', 20, 2);
            $table->timestamps();
            $table->integer('updated_by');
            $table->tinyInteger('loan_status')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('loans');
    }
}
