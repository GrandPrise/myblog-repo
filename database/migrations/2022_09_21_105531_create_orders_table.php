<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('commandeur');
            $table->string('phone_number');
            $table->string('whatsapp_number')->nullable();
            $table->string('city');
            $table->string('address');
            $table->string('item');
            $table->integer('quantity');
            $table->decimal('total_price', 6, 2)->default(0);
            $table
                ->mediumText('remark')
                ->nullable()
                ->default('Remarque');
            $table->integer('created_by')->default('0');
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
