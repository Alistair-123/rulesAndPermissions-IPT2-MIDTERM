<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'email')) {
                $table->string('manufacturer')->nullable();
                $table->dropColumn('email');
            }
            if (Schema::hasColumn('events', 'phone')) {
                $table->string('year')->nullable();
                $table->dropColumn('phone');
            }
        });
    }

    public function down()
    {
        Schema::table('events', function (Blueprint $table) {
            if (Schema::hasColumn('events', 'manufacturer')) {
                $table->string('email')->nullable();
                $table->dropColumn('manufacturer');
            }
            if (Schema::hasColumn('events', 'year')) {
                $table->string('phone')->nullable();
                $table->dropColumn('year');
            }
        });
    }
};
