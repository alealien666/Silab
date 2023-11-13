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
        // Order::where('status', 'approved')
        //     ->where('order_date', '>', now()->format('Y-m-d'))
        //     ->each(function ($order) {
        //         $daysDifference = now()->diffInDays($order->order);  //ngitung selisih hari
        //         if ($daysDifference < 1) {
        //             $order->lab()->updateExistingPivot($order->id_lab, ['status' => 'di gunakan']);
        //         }
        //     });

        // Setelah 1 hari dari tanggal penyewaan, ubah status lab menjadi "tersedia" lagi
        // Order::where('status', 'di gunakan')
        //     ->where('order', '<', now()->subDay()->format('Y-m-d'))
        //     ->each(function ($order) {
        //         $order->lab()->updateExistingPivot($order->id_lab, ['status' => 'tersedia']);
        //     });
        $usedLabIds = detail_order::join('orders', 'detail_orders.id_order', '=', 'orders.id')
            ->join('labs', 'detail_orders.id_lab', '=', 'labs.id')
            ->where('orders.status', 'di gunakan')
            ->where('orders.order', '>', now()->format('Y-m-d'))
            ->pluck('detail_orders.id_lab')
            ->toArray();

        $availableLabIds = Lab::whereNotIn('id', $usedLabIds)->pluck('id')->toArray();

        // Lab::whereIn('id', $availableLabIds)->update(['status' => 'tersedia']);

        Lab::whereIn('id', $usedLabIds)->update(['status' => 'di gunakan']);


        // ngubah ke tersedia lagi setelah 1 hari
        $usedLabIds = detail_order::join('orders', 'detail_orders.id_order', '=', 'orders.id')
            ->join('labs', 'detail_orders.id_lab', '=', 'labs.id')
            ->where('orders.status', 'di gunakan')
            ->where('orders.order', '<', now()->subDay()->format('Y-m-d'))
            ->pluck('detail_orders.id_lab')
            ->toArray();

        $availableLabIds = Lab::whereNotIn('id', $usedLabIds)->pluck('id')->toArray();

        // Lab::whereIn('id', $availableLabIds)->update(['status' => 'di gunakan']);

        Lab::whereIn('id', $usedLabIds)->update(['status' => 'tersedia']);
    }
}
