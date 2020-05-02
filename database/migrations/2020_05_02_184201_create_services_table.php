<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('company_id');

            $table->text('short_description');
            $table->text('description');

            $table->text('photo');

            $table->timestamps();
        });

        Schema::table('services', function (Blueprint $table) {
            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('company_id')
                ->on('companies')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('services');
    }
}
