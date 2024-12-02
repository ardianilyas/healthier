<?php

namespace App\Console\Commands;

use App\Models\Transaction;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeletePendingTransactions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'transactions:delete-pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete all pending transactions from the database';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deletedCount = Transaction::where('status', 'pending')->delete();

        $this->info("Deleted {$deletedCount} transactions from the database");
    }
}
