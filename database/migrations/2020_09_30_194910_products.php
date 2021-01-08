<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('categoryID');
            $table->string('title');
            $table->string('content');
            $table->integer('price');
            $table->string('image');
            $table->string('slug');
            $table->string('info'); //Ürün ek Bilgi
            $table->string('size');
            $table->string('color'); //Ürün rengi
            $table->string('cargopayment'); //Kargo Ödeme
            $table->string('cargo'); //Nereden Kargo
            $table->string('sendarea'); // Kargo gönderim alanı
            $table->string('cargocompany'); //KArgo Şirketi
            $table->string('cargonumber'); //KArgo Takip numarası
            $table->integer('check')->default(0)->comment('0:onaylanmadı 1:onaylandı');
            $table->string('status');
            $table->integer('hit')->default(0);
            $table->integer('userID');
            $table->timestamps();


            //ürünler tablosu categoryID ile categories tablosunda bulunan ID'nin eşleştirilmesi
            $table->foreign('categoryID')
                ->references('id')
                ->on('categories');

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
}
