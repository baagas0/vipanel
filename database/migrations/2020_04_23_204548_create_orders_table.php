<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('users_id');
            $table->bigInteger('api_id');
            $table->string('target');
            $table->integer('quantity')->nullable();
            $table->text('custom_comments')->nullable();
            $table->string('custom_link')->nullable();
            $table->boolean('is_deposit');
            $table->string('payments_id')->nullable();
            $table->foreignId('vouchers_id')->nullable();
            $table->enum('status',['Waiting','Success','Failed','Refund']);
            $table->string('approved_at');
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
        Schema::dropIfExists('orders');
    }
}
