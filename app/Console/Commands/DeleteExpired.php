<?php

namespace App\Console\Commands;

use App\Models\Order;
use App\Models\Alat_Tambahan;
use Illuminate\Console\Command;

class DeleteExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:delete-expired';

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
        $now = now();
        $expiredOrders = Order::where('expired_at', '<=', $now)->get();

        foreach ($expiredOrders as $order) {
            if ($order->bukti_pembayaran === null) {
                $order->alat()->detach();
                $order->delete();
            }
            foreach ($order->alat as $alat) {
                $masterAlat = Alat_Tambahan::find($alat->id);
                $masterAlat->update(['jumlah' => $masterAlat->jumlah + $alat->pivot->jumlah_alat]);
            }
        }
    }
}
