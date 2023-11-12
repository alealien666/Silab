<?php

namespace Database\Seeders;

use App\Models\Analisis;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AnalisisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $analisis = [
            // MIKROBIOLOGI
            [
                'jenis_pengujian' => 'Bakteri Coliform',
                'jenis_analisa' => 'Kualitatif',
                'harga' => 100000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Bakteri Salmonella',
                'jenis_analisa' => 'Kualitatif',
                'harga' => 100000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Bakteri Stapillococcus',
                'jenis_analisa' => 'Kualitatif',
                'harga' => 100000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Listeria monocitogenes',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 250000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Listeria SP (minimal 20 sampel)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 150000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Total bakteri (TPC)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 125000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Total Bakteri Acetobakter acety (CFU/gram)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 125000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Total Bakteri Asam Lactat',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 125000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Total Bakteri Coliform Metode MPN',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 125000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Total Bakteri Salmonella',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 125000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Total Baktri Stapillococcus',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 125000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Total Kapang',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 125000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Total Khamir',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 125000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Zona Hambat Mikroba',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 125000,
                'category_id' => 1
            ],
            [
                'jenis_pengujian' => 'Total Bakteri Asam Lactat',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 125000,
                'category_id' => 1
            ],

            // KIMIA
            [
                'jenis_pengujian' => 'Aktifitas Antioksidan',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Alkohol',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 77500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Antosianin',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Amilosa',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Amilopectin',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Asam Benzoat',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Asam Lemak Bebas',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 77500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Asam Salisilat',
                'jenis_analisa' => 'Kualitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Asam Fitat',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Asam Laktat',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 47500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Asam laurat',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Asam Lemak Bebas (FFA)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Alkali Bebas',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'AW',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 70000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Analisa Proksimat (Kadar Air , kadar Abu, Protein, lemak, karbohidrat)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 265000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Besi (Fe)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Bilangan Iod',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Bilangan penyabunan',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Bilangan Peroksida',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'BOD',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Calsium',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Chlorin',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'CO2 bebas',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 40000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Flavonoid',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Formalin',
                'jenis_analisa' => 'Kualitatif',
                'harga' => 77500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Fruktosa',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 85000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Garam (Brix)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 57500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Garam (NaCL)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 77500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Glukosa',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Gula (Brix)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 57500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Gula Reduksi',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 80000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Gula Reduksi Nelson',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 47500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Glukomanan',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Gula Total',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Glukosa',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 85000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'HCN (Asam Sianida)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 100000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'IC 50',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 250000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Isoflavon',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Kadar Air',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 20000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Kadar Abu',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 25000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Kafein',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Kalium',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'kalsium',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Karbohidrat',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 85000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Kesadahan Total (Mg, Calsium)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 77500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Klorofil',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Khlorin (kualitatif)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 67500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Kalori / Energi',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 20000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Kalori lengkap dengan kadar Lemak, kadar karbohidrat dan kadar Protein',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 250000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Lactose',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 85500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Lemak',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 60000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Likopen',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 77500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Logam Berat',
                'jenis_analisa' => 'Kualitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Magnesium',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Natrium',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Nitrit',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Oksigen Terlarut',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 57500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Pati',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 85000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Pati Resisten',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 95000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Pectin',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Phenol',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Phospat',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Phosphor',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Protein (Kjeldal)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 77500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Protein Formol',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 51750,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Respirasi (O2)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 41250,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Sacharin',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 77500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Serat Kasar',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 60000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Serat Pangan',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Sukrosa',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 85000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Tannin',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Total Asam',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 41250,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Total solid / Padatan ',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 47500,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Total Gula (Luff Skhroll)',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'TVBN ( Kesegaran )',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 90000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Vit C',
                'jenis_analisa' => 'Kualitatif',
                'harga' => 42750,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Vit A ( Betakaroten )',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 250000,
                'category_id' => 2
            ],
            [
                'jenis_pengujian' => 'Volatil',
                'jenis_analisa' => 'Kuantitatif',
                'harga' => 120000,
                'category_id' => 2
            ],
            // fisika
            [
                'jenis_pengujian' => 'Aroma',
                'harga' => 40000,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'BJ (Berat Jenis)',
                'harga' => 37500,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Daya Ikat Air (WHC)',
                'harga' => 40000,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Daya Leleh',
                'harga' => 40000,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Densitas',
                'harga' => 37500,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Daya Kembang',
                'harga' => 40000,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Daya Seduh',
                'harga' => 37500,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Elastisitas',
                'harga' => 47500,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Kelarutan',
                'harga' => 37500,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Ketebalan',
                'harga' => 37500,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Kekeruhan',
                'harga' => 37500,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'pH',
                'harga' => 18750,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Rehidrasi',
                'harga' => 37500,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Susut Masak',
                'harga' => 40000,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Swelling Power',
                'harga' => 40000,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Tekstur',
                'harga' => 40000,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Viscositas/Kekentalan',
                'harga' => 37500,
                'category_id' => 3
            ],
            [
                'jenis_pengujian' => 'Warna',
                'harga' => 40000,
                'category_id' => 3
            ],
        ];

        foreach ($analisis as $analis) {
            $analis['slug'] = Str::slug($analis['jenis_pengujian']);
            Analisis::create($analis);
        }
    }
}
