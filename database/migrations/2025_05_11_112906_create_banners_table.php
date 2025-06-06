<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained('companies')->cascadeOnDelete();
            $table->string('title')->default('أفخر الأنواع تناسب ذوقك');
            $table->text('main_text')->default('جمال يستقر حيث تبدأ كل خطوة');
            $table->text('sub_text')->nullable()->default('تحت كل خطوة، تُروى حكاية من الحجر والبريق — صيغت من الأرض، وقبلتها النار، لتوقظ المكان بجمال لا يزول');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
