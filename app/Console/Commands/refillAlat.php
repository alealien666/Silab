<?php

namespace App\Console\Commands;

use App\Models\Alat_Tambahan;
use App\Models\detail_order;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class refillAlat extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:refill-alat';

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
        $orderAlats = detail_order::join('orders', 'detail_orders.id_order', 'orders.id')
            ->where('status', 'approved')
            ->where('orders.order', '=', now()->subDay()->format('Y-m-d'))
            ->select('detail_orders.id_alat', 'detail_orders.jumlah_alat')
            ->get();

        foreach ($orderAlats as $orderAlat) {
            Alat_Tambahan::updateOrInsert(
                ['id' => $orderAlat->id_alat],
                ['jumlah' => DB::raw('jumlah +' . $orderAlat->jumlah_alat)],
                ['jumlah_alat' => $orderAlat->jumlah_alat]
            );
        }
    }
}
