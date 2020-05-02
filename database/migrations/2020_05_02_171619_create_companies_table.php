<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->text('logo')->nullable();
            $table->string('type');

            $table->unsignedBigInteger('category_id')->nullable();
            $table->unsignedBigInteger('creator_id')->nullable();

            $table->text('short_description');
            $table->text('description')->nullable();

            $table->string('province');
            $table->string('city');
            $table->text('address');

            $table->text('social_instagram')->nullable();
            $table->text('social_telegram')->nullable();
            $table->text('social_facebook')->nullable();
            $table->text('social_twitter')->nullable();

            $table->string('phone_number');
            $table->string('mobile_number')->nullable();
            $table->string('fax_number')->nullable();

            $table->decimal('longitude', 10, 7);
            $table->decimal('latitude', 10, 7);

            $table->text('website')->nullable();

            $table->timestamps();
        });

        Schema::table('companies', function (Blueprint $table) {
            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('set null');

            $table->foreign('creator_id')
                ->on('users')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
