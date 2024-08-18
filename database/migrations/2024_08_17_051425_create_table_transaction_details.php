<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('table_transaction_details', function (Blueprint $table) {
            $table->id();
            $table->string('transaction_uid');
            $table->string('product_uid');
            $table->string('qty');
            $table->double('price');
            $table->timestamps();

            $table->foreign(['transaction_uid'])->references(['uid'])->on('table_transaction');
            $table->foreign(['product_uid'])->references(['uid'])->on('table_product');
        });

        Schema::table('table_product', function (Blueprint $table){
            $table->enum('status', ['on', 'off'])->default('on');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_transaction_details');
    }
};
