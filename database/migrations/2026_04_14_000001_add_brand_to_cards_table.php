<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('cards', function (Blueprint $table) {
            // card_number ya existe — la usaremos sólo para los últimos 4 dígitos
            // Agregamos card_brand para mostrar ícono correcto
            $table->string('card_brand', 20)->default('visa')->after('card_number');
            // cvv lo hacemos nullable (no debería guardarse, pero está en la migración original)
            $table->string('cvv', 4)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('cards', function (Blueprint $table) {
            $table->dropColumn('card_brand');
        });
    }
};
