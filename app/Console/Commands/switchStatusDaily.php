<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\Lab;

class switchStatusDaily extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:switch-status-daily';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $usedLabIds = Order::join('labs', 'orders.id', '=', 'labs.id')
            ->where('orders.status', 'di gunakan')
            ->where('orders.order', '<', now())
            ->pluck('orders.id_lab')
            ->toArray();

        Lab::whereIn('id', $usedLabIds)->update(['status' => 'tersedia']);
    }
}
