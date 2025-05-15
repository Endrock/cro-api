<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Agrega las columnas
            $table->unsignedBigInteger('role_id')->nullable()->after('password');
            $table->unsignedBigInteger('team_id')->nullable()->after('role_id');

            // Define las claves foráneas
            $table->foreign('role_id')
                  ->references('id')
                  ->on('roles')
                  ->nullOnDelete();

            $table->foreign('team_id')
                  ->references('id')
                  ->on('teams')
                  ->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Elimina las claves foráneas y columnas
            $table->dropForeign(['role_id']);
            $table->dropForeign(['team_id']);
            $table->dropColumn(['role_id', 'team_id']);
        });
    }
};
