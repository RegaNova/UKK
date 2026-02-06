<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('activity_logs', function (Blueprint $table) {
            if (!Schema::hasColumn('activity_logs', 'tanggal_mulai')) {
                $table->date('tanggal_mulai')->nullable()->after('jumlah');
            }
            if (!Schema::hasColumn('activity_logs', 'tanggal_selesai')) {
                $table->date('tanggal_selesai')->nullable()->after('tanggal_mulai');
            }
        });
    }

    public function down(): void
    {
        Schema::table('activity_logs', function (Blueprint $table) {
            if (Schema::hasColumn('activity_logs', 'tanggal_mulai')) {
                $table->dropColumn('tanggal_mulai');
            }
            if (Schema::hasColumn('activity_logs', 'tanggal_selesai')) {
                $table->dropColumn('tanggal_selesai');
            }
        });
    }
};
