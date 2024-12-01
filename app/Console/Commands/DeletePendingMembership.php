<?php

namespace App\Console\Commands;

use App\Models\Membership;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class DeletePendingMembership extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'membership:delete-pending';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete pending memberships';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $deletedMemberships = Membership::where('status', 'pending')->delete();

        Log::info("Deleted {$deletedMemberships} memberships");
    }
}
