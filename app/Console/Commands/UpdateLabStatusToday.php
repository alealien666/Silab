<?php

namespace App\Console\Commands;

use App\Models\Lab;
use Illuminate\Console\Command;
use App\Models\Order;
use App\Models\detail_order;

class UpdateLabStatusToday extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-lab-status-today';

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
        // Ambil semua id lab yang digunakan dari tabel pivot
        $usedLabIds = detail_order::join('orders', 'detail_orders.id_order', '=', 'orders.id')
            ->join('labs', 'detail_orders.id_lab', '=', 'labs.id')
            ->where('orders.status', 'approved')
            ->where('orders.order', '=', now()->format('Y-m-d'))
            ->pluck('detail_orders.id_lab')
            ->toArray();

        $availableLabIds = Lab::whereNotIn('id', $usedLabIds)->pluck('id')->toArray();

        // Lab::whereIn('id', $availableLabIds)->update(['status' => 'tersedia']);

        Lab::whereIn('id', $usedLabIds)->update(['status' => 'di gunakan']);
    }
}
