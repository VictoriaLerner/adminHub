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
        Schema::create('sites', function (Blueprint $table) {
            $table->id();
            $table->string('domain')->unique();
            $table->string('admin_url');


            $table->unsignedBigInteger('cdn_id')->nullable();
            $table->foreign('cdn_id')
                  ->references('id')
                  ->on('cdns')
                  ->onDelete('set null');


            $table->unsignedBigInteger('server_id')->nullable();
            $table->foreign('server_id')
                  ->references('id')
                  ->on('servers')
                  ->onDelete('set null');

            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sites');
    }
};
