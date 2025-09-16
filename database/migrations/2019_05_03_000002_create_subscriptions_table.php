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
        // Check if subscriptions table already exists
        if (Schema::hasTable('subscriptions')) {
            // Update existing table to match Cashier requirements
            Schema::table('subscriptions', function (Blueprint $table) {
                // Add missing columns if they don't exist
                if (!Schema::hasColumn('subscriptions', 'stripe_status')) {
                    $table->string('stripe_status')->after('stripe_id');
                }
                if (!Schema::hasColumn('subscriptions', 'stripe_price')) {
                    $table->string('stripe_price')->nullable()->after('stripe_status');
                }
                
                // Make stripe_id unique if it isn't already
                if (!Schema::hasColumn('subscriptions', 'stripe_id')) {
                    $table->string('stripe_id')->unique()->after('name');
                }
                
                // Add index if it doesn't exist
                $table->index(['user_id', 'stripe_status']);
            });
        } else {
            // Create new table if it doesn't exist
            Schema::create('subscriptions', function (Blueprint $table) {
                $table->id();
                $table->foreignId('user_id');
                $table->string('name');
                $table->string('stripe_id')->unique();
                $table->string('stripe_status');
                $table->string('stripe_price')->nullable();
                $table->integer('quantity')->nullable();
                $table->timestamp('trial_ends_at')->nullable();
                $table->timestamp('ends_at')->nullable();
                $table->timestamps();

                $table->index(['user_id', 'stripe_status']);
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscriptions');
    }
};
