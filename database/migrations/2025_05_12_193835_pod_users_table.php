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
        Schema::create('pod_user', function (Blueprint $table) {
            $table->unsignedBigInteger('pod_id');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            // Primary key combinada
            $table->primary(['pod_id', 'user_id']);

            // Foreign keys
            $table->foreign('pod_id')
                  ->references('id')
                  ->on('pods')
                  ->onDelete('cascade');

            $table->foreign('user_id')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pod_user');
    }
};
