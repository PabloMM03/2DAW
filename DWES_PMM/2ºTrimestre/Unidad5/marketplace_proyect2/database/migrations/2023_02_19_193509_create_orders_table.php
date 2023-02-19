<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Tabla ordenenes para pagar y sus metodos
        Schema::create('orders', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('order_number');
            $table->enum('status', ['pending', 'processing', 'completed', 'decline'])->default('pending'); //Proceso de pago
            $table->integer('item_count');
            $table->boolean('is_paid')->default(false); //Si esta pagado
            $table->enum('payment_method', ['cash_on_delivery', 'paypal', 'stripe', 'card'])->default('cash_on_delivery'); // metodo de pago


            //campos formulario de relleno
            

            $table->string('shipping_fullname');
            $table->string('shipping_address');
            $table->string('shipping_city');
            $table->string('shipping_state');
            $table->string('shipping_zipcode');
            $table->string('shipping_phone');

            //notas
            $table->string('notes')->nullable();

            //Datos de facturacion
            $table->string('billing_fullname');
            $table->string('billing_address');
            $table->string('billing_city');
            $table->string('billing_state');
            $table->string('billing_zipcode');
            $table->string('billing_phone');

            $table->float('total');

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
};
