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
        Schema::create('license_plan', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // 플랜 이름
            $table->string('code')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->string('type')->nullable();
            $table->string('price')->nullable(); // 이메일 발급
            $table->string('unit')->nullable();

            // json 데이터 저장
            $table->json('detail')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license_plan');
    }
};
