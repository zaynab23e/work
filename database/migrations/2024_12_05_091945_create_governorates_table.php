<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('governorates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });
        DB::table('governorates')->insert([
            ['name'=>'السويس'],
            ['name'=>'دمياط'],
            ['name'=>'القليوبية'],
            ['name'=>'المنوفية'],
            ['name'=>'الغربية'],
            ['name'=>'الشرقية'],
            ['name'=>'الدقهلية'],
            ['name'=>'البحيرة'],
            ['name'=>'كفر الشيخ'],
            ['name'=>'الأقصر'],
            ['name'=>'قنا'],
            ['name'=>'سوهاج'],
            ['name'=>'أسيوط'],
            ['name'=>'المنيا'],
            ['name'=>'بني سويف'],
            ['name'=>'الفيوم'],
            ['name'=>'بورسعيد'],
            ['name'=>'الإسكندرية'],
            ['name'=>'الجيزة'],
            ['name'=>'القاهرة'],
            ['name'=>'جنوب سيناء'],
            ['name'=>'شمال سيناء'],
            ['name'=>'مطروح'],
            ['name'=>'الوادي الجديد'],
            ['name'=>'البحر الأحمر'],
            ['name'=>'أسوان'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('governorates');
    }
};
