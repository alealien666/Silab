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
        // $order = Order::where('status', 'approved')
        //     ->where('order', '=', now()->format('Y-m-d'))
        //     ->get();

        // $order->each(function ($item) {
        //     $lab = $item->lab()->first();
        //     $newStatus = ($lab === 'tersedia') ? 'di gunakan' : 'tersedia';
        //     $item->lab()->updateExistingPivot($lab->id, ['status' => $newStatus]);
        // });

        // Ambil semua id lab yang digunakan dari tabel pivot
        $usedLabIds = detail_order::join('orders', 'detail_orders.id_order', '=', 'orders.id')
            ->join('labs', 'detail_orders.id_lab', '=', 'labs.id')
            ->where('orders.status', 'approved')
            ->where('orders.order', '=', now()->format('Y-m-d'))
            ->pluck('detail_orders.id_lab')
            ->toArray();

        // Ambil semua id lab yang tidak digunakan
        $availableLabIds = Lab::whereNotIn('id', $usedLabIds)->pluck('id')->toArray();

        // Update status menjadi 'tersedia' untuk lab yang tidak digunakan
        Lab::whereIn('id', $availableLabIds)->update(['status' => 'tersedia']);

        // Update status menjadi 'di gunakan' untuk lab yang digunakan
        Lab::whereIn('id', $usedLabIds)->update(['status' => 'di gunakan']);
    }
}
