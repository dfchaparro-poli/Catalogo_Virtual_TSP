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
        Schema::table('orders', function (Blueprint $table) {
            // Si existe, eliminamos la columna
            if (Schema::hasColumn('orders', 'payment_method')) {
                $table->dropColumn('payment_method');
            }
        });

        Schema::table('orders', function (Blueprint $table) {
            // La volvemos a crear como nullable
            $table->string('payment_method')
                ->nullable()
                ->default(null)
                ->after('total');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Dropeamos de nuevo
            $table->dropColumn('payment_method');
        });

        Schema::table('orders', function (Blueprint $table) {
            // Restauramos la versión no-nullable
            $table->string('payment_method')
                ->nullable(false)
                ->default('unknown')
                ->after('total');
        });
    }
};
