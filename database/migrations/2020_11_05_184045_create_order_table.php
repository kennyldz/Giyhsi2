<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderTable extends Migration
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
            $table->unsignedBigInteger('productID')->comment('ürün ID');
            $table->string('province')->comment('il');
            $table->string('district')->comment('ilçe');
            $table->string('address')->comment('Adres');
            $table->string('name')->comment('Ad-Soyad');
            $table->string('telephone')->comment('telefon');
            $table->string('cargoNumber')->comment('Kargo Takip No');
            $table->integer('senderUserID')->comment('ürün sahibi');
            $table->integer('receiverUserID')->comment('alan üye');
            $table->string('status')->comment('sipariş statü');
            $table->string('comment')->comment('Yorum olması durumunda-iptal vb.');
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
