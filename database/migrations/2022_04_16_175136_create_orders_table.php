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
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->foreignId('billing_address_id')->nullable()->constrained()->nullOnDelete();
            $table->string('invoice_no');
            $table->string('payment_type')->nullable();
            $table->string('payment_status')->default(false)->comment('0 => unpaid,1=>paid');
            $table->integer('total_quantity')->default(0);
            $table->double('sub_total')->default(0);
            $table->double('total_discount')->default(0);
            $table->double('total_tax')->default(0);
            $table->double('delivery_charge')->default(0);
            $table->double('total_amount')->default(0);
            $table->double('total_payable')->default(0);
            $table->boolean('delivery_status')->default(0)->comment('0=>pending,1=>confirmed,2=>delivered');
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
