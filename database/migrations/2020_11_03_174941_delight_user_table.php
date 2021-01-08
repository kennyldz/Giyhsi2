<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DelightUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('delight', function (Blueprint $table) {
            //
            $table->bigIncrements('id');
            $table->unsignedBigInteger('userID');
            $table->integer('amount')->default(0)->comment('Kullanıcının lokum miktarı');
            $table->integer('check')->default(0)->comment('ilk promosyon lokum hakkını kullanmış mı ');
            $table->string('detail')->comment('İşlem Açıklaması');
            $table->timestamps();

            //delight tablosu UserID ile users tablosunda bulunan ID'nin eşleştirilmesi
            $table->foreign('userID')
                ->references('id')
                ->on('users');

        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('delight', function (Blueprint $table) {
            //
        });
    }
}
