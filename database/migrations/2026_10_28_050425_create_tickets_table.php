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
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_number')->unique();
            $table->string('subject');
            $table->text('description');
            $table->foreignId('requesting_department_id')->constrained('departments');
            $table->foreignId('receiving_department_id')->constrained('departments');
            $table->foreignId('requester_id')->constrained('users');
            $table->foreignId('assigned_to_id')->nullable()->constrained('users');
            $table->foreignId('category_id')->nullable()->constrained('ticket_categories');
            $table->foreignId('priority_id')->constrained('ticket_priorities');
            $table->foreignId('location_id')->nullable()->constrained('locations');
            $table->enum('status', ['Open', 'Acknowledged', 'In Progress', 'On Hold', 'Resolved', 'Closed', 'Reopened', 'Cancelled'])->default('Open');
            $table->datetime('occurrence_at')->nullable();
            $table->datetime('preferred_completion_at')->nullable();
            $table->string('asset_identifier')->nullable();
            $table->text('resolution_summary')->nullable();
            $table->datetime('acknowledged_at')->nullable();
            $table->datetime('closed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tickets');
    }
};
