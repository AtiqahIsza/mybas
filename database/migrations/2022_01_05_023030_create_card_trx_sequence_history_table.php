<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardTrxSequenceHistoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_trx_sequence_history', function (Blueprint $table) {
            $table->id();
            $table->decimal('balance_in_card')->nullable();
            $table->unsignedInteger('card_trx_sequence')->nullable();
            $table->dateTime('transaction_date');
            $table->dateTime('upload_date');
            $table->unsignedBigInteger('card_id')->nullable()->index('FKB86BE7CA1483D948');
            $table->unsignedBigInteger('pda_id')->nullable()->index('FKB86BE7CA53504BCC');
            $table->unsignedBigInteger('sales_id')->nullable()->index('FKB86BE7CA1CD2E170');
            $table->unsignedBigInteger('transaction_id')->nullable()->index('FKB86BE7CAED6F8356');

            $table->foreign(['pda_id'], 'FKB86BE7CA53504BCC')->references(['id'])->on('pda_profile')->onDelete('cascade');
            $table->foreign(['sales_id'], 'FKB86BE7CA1CD2E170')->references(['id'])->on('ticket_sales_transaction')->onDelete('cascade');
            $table->foreign(['transaction_id'], 'FKB86BE7CAED6F8356')->references(['id'])->on('agent_account')->onDelete('cascade');
            $table->foreign(['card_id'], 'FKB86BE7CA1483D948')->references(['id'])->on('ticket_card')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('card_trx_sequence_history');
    }
}
