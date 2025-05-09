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
        Schema::rename('alert_sents', 'alerts_sent');
        Schema::dropIfExists('alert_sents');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alerts_sent', function (Blueprint $table) {
            //
        });
    }
};
