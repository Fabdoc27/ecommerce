<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void {
        Schema::create( 'invoices', function ( Blueprint $table ) {
            $table->id();

            $table->string( 'total', 100 );
            $table->string( 'vat', 100 );
            $table->string( 'payable', 100 );
            $table->string( 'cust_details' );
            $table->string( 'ship_details' );
            $table->string( 'tran_id', 100 );
            $table->string( 'val_id', 100 )->default( 0 );
            $table->enum( 'delivery_status', ['Pending', 'Processing', 'Completed'] );
            $table->string( 'payment_status' );

            $table->unsignedBigInteger( 'user_id' );
            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )
                ->restrictOnDelete()->cascadeOnUpdate();

            $table->timestamp( 'created_at' )->useCurrent();
            $table->timestamp( 'updated_at' )->useCurrent()->useCurrentOnUpdate();
        } );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists( 'invoices' );
    }
};