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
        Schema::create('charity_tenant', function (Blueprint $table) {
            $table->id(); 
            $table->unsignedBigInteger('charity_id')->nullable();
            $table->foreign('charity_id')->references('id')->on('charities');
            $table->string('tenant_id')->nullable();
            $table->foreign('tenant_id')->references('id')->on('tenants');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('charity_tenant');
    }
};
