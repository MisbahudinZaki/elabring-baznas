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
        Schema::table('absenpulangs', function (Blueprint $table) {
            $table->bigInteger('user_id')->nullable()->after('status_pulang');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('absenpulangs', function (Blueprint $table) {
            //
        });
    }
};
