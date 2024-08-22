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
        Schema::create('inwards', function (Blueprint $table) {
            $table->id();
            $table->integer('delivery_id');
            $table->integer('letter_id');
            $table->string('usertype', 100);
            $table->string('fromwhom', 100);
            $table->foreignId('ward_id');
            $table->string('subject', 100);
            $table->string('sendername_designation', 100);
            $table->foreignId('letter_ref_no');

            $table->date('recevied_data')->nullable();
            $table->date('letter_date')->nullable();
            $table->date('daily_date')->nullable();

            $table->string('file_upload', 100);

            $table->string('mobile', 100);
            $table->string('email', 100);
            $table->string('comments', 250);
            $table->foreignId('created_by')->nullable()->constrained('users');
            $table->foreignId('updated_by')->nullable()->constrained('users');
            $table->foreignId('deleted_by')->nullable()->constrained('users');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inwards');
    }
};
