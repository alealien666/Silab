<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Order;

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
        Order::where('status', 'approved')
            ->where('order_date', '>', now()->format('Y-m-d'))
            ->each(function ($order) {
                $daysDifference = now()->diffInDays($order->order);  //ngitung selisih hari
                if ($daysDifference < 1) {
                    $order->lab()->updateExistingPivot($order->id_lab, ['status' => 'di gunakan']);
                }
            });

        // Setelah 1 hari dari tanggal penyewaan, ubah status lab menjadi "tersedia" lagi
        Order::where('status', 'di gunakan')
            ->where('order', '<', now()->subDay()->format('Y-m-d'))
            ->each(function ($order) {
                $order->lab()->updateExistingPivot($order->id_lab, ['status' => 'tersedia']);
            });
    }
}
