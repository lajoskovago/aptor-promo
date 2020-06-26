<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTuristsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tourists', function (Blueprint $table) {
            Schema::create('tourists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nume');
            $table->string('prenume');
            $table->string('email');
            $table->string('telefon');
            $table->string('hotel');
            $table->date('checkin_date');
            $table->date('checkout_date');
            $table->timestamp('checkout_timestamp');
            $table->string('oras');
            $table->string('tara');
            $table->string('transport');
            $table->string('scop');
            $table->string('voucher')->nullable();
            $table->string('promo_code');
            $table->string('promo_code_active');
            $table->timestamps();
        });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tourists');
    }
}
