<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVouchersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vouchers', function (Blueprint $table) {
            $table->id();
            $table->enum('type',['Percent','Amount']);
            $table->string('code');
            $table->decimal('min_amount', 11, 2)->nullable();
            $table->integer('percent')->nullable();
            $table->decimal('max_discount', 11, 2)->nullable();
            $table->decimal('amount', 11, 2)->nullable();
            $table->integer('quota');
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('vouchers');
    }
}
