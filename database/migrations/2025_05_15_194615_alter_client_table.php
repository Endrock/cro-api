<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('clients', function (Blueprint $table) {
            $table->unsignedBigInteger('client_status_id')->nullable();
            $table->unsignedBigInteger('client_weight_id')->nullable();
            $table->unsignedBigInteger('account_manager_id')->nullable();

            $table->foreign('client_status_id')->references('id')->on('client_statuses')->nullOnDelete();
            $table->foreign('client_weight_id')->references('id')->on('client_weights')->nullOnDelete();
            $table->foreign('account_manager_id')->references('id')->on('users')->nullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
