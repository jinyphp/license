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
        Schema::create('license_pub', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            // 라이센스
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('title')->nullable();
            $table->text('description')->nullable();

            $table->string('domain')->nullable();
            $table->string('email')->nullable(); // 이메일 발급
            $table->string('salt')->nullable();

            // 만료일자
            $table->string('expired_at')->nullable();

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
        Schema::dropIfExists('license_pub');
    }
};
