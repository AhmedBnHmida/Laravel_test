<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('bookings', function (Blueprint $table) {
            // Add total_price column
            if (!Schema::hasColumn('bookings', 'total_price')) {
                $table->decimal('total_price', 10, 2)->after('end_date');
            }
            
            // Add status column
            if (!Schema::hasColumn('bookings', 'status')) {
                $table->enum('status', ['pending', 'confirmed', 'cancelled'])->default('pending')->after('total_price');
            }
        });
    }

    public function down()
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropColumn(['total_price', 'status']);
        });
    }
};