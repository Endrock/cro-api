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
        Schema::create('pod_client', function (Blueprint $table) {
            $table->unsignedBigInteger('pod_id');
            $table->unsignedBigInteger('client_id');
            $table->timestamps();

            // Primary key combinada
            $table->primary(['pod_id', 'client_id']);

            // Foreign keys
            $table->foreign('pod_id')
                  ->references('id')
                  ->on('pods')
                  ->onDelete('cascade');

            $table->foreign('client_id')
                  ->references('id')
                  ->on('clients')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pod_client');
    }
};
