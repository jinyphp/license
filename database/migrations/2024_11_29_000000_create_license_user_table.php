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
        Schema::create('license_user', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('domain')->nullable();
            $table->string('company')->nullable();

            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('user_id')->nullable();

            $table->integer('plans')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license_user');
    }
};
