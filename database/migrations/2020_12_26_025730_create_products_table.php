<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id()->index();
            $table->BigInteger('category_id')->unsigned()->index();
            $table->BigInteger('company_id')->unsigned()->index();
            $table->string('name', 191);
            $table->text('explain');
            $table->text('content');
            $table->string('pic', 191);
            $table->boolean('kurdish')->nullable()->default(false);
            $table->string('kurdname', 191);
            $table->string('kurd_explain', 191);
            $table->string('kurd_content', 191);
            $table->timestamps();
        });
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')
                ->on('categories')
                ->references('id')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ;

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
        Schema::dropIfExists('products');
    }
}
