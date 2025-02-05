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
        Schema::create('license', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // 라이센스 제목
            $table->string('code')->nullable();
            $table->string('title')->nullable();
            // 라이센스 설명
            $table->text('description')->nullable();

            $table->string('salt')->nullable();

            $table->text('license')->nullable();

            // 만료일자
            $table->string('expired_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('license');
    }
};
