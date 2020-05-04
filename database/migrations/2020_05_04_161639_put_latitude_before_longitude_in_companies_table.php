<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PutLatitudeBeforeLongitudeInCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('companies', function($table) {
            $table->renameColumn('longitude', 'longitude_old');
        });

        Schema::table('companies', function(Blueprint $table) {
            $table->decimal('longitude', 10, 7)->after('latitude');
        });

        DB::table('companies')->update([
            'longitude' => DB::raw('longitude_old')
        ]);

        Schema::table('companies', function(Blueprint $table) {
            $table->dropColumn('longitude_old');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('companies', function (Blueprint $table) {
            // Nobody cares about the down
        });
    }
}
