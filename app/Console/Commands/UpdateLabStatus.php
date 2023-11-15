<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\detail_order;
use App\Models\Lab;

class UpdateLabStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-lab-status';

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
            ->where('orders.status', 'approved')
            ->where('orders.order', '>', now()->format('Y-m-d'))
            ->pluck('orders.id_lab')
            ->toArray();

        Lab::whereIn('id', $usedLabIds)->update(['status' => 'di gunakan']);
    }
}
