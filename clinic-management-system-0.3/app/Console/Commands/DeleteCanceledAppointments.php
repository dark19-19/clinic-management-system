<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Appointment;

class DeleteCanceledAppointments extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'appointments:delete-canceled';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete canceled appointments older than 24 hours';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $count = Appointment::where('status', 'canceled')
            ->where('canceled_at', '<=', now()->subHours(24))
            ->delete();

        $this->info("Deleted {$count} canceled appointments.");
    }
}
