<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')->constrained()->onDelete('cascade');
            $table->unsignedInteger('doctor_id')->constrained()->onDelete('set null')->nullable();
            $table->dateTime('visit_date');
            $table->string('reason')->nullable();
            $table->timestamps();
        });
    }

    public function down(): voidun
    {
        Schema::dropIfExists('visits');
    }
};
