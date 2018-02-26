<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUploadedStatementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('uploaded_statements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('uploaded_file_id');
            $table->string('vendor_code')->nullable();
            $table->string('partner_name')->nullable();
            $table->string('login_id')->nullable();
            $table->string('bonus_time')->nullable();
            $table->integer('total_riders')->nullable();
            $table->integer('unverified_riders')->nullable();
            $table->integer('rating')->nullable();
            $table->string('acceptance')->nullable();
            $table->integer('total_collection')->nullable();
            $table->integer('total_fare')->nullable();
            $table->decimal('bonus', 10, 2)->nullable();
            $table->decimal('wallet_balance', 10, 2)->nullable();
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
        Schema::dropIfExists('uploaded_statements');
    }
}
