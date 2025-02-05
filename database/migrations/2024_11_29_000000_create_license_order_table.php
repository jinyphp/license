<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('license_order', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('user_name')->nullable();
            $table->string('user_id')->nullable();
            $table->string('email')->nullable();

            $table->string('plan_id')->nullable();
            $table->string('title')->nullable();
            $table->string('type')->nullable();
            $table->string('price')->nullable();

            $table->string('payment')->nullable();
            $table->string('status')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license_order');
    }
};
