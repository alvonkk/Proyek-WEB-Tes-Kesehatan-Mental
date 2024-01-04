<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AspekPenilaianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'STRESS',
                'Menjadi marah karena hal-hal kecil/sepele'
            ],
            [
                'KECEMASAN',
                'Mulut terasa kering'
            ],
            [
                'DEPRESI',
                'Tidak dapat melihat hal yang positif dari suatu kejadian'
            ],
            [
                'KECEMASAN',
                'Merasakan gangguan dalam bernapas (napas cepat, sulit bernapas)'
            ],
            [
                'DEPRESI',
                'Merasa sepertinya tidak kuat lagi untuk melakukan suatu kegiatan'
            ],
            [
                'STRESS',
                'Cenderung bereaksi berlebihan pada situasi'
            ],
            [
                'KECEMASAN',
                'Kelemahan pada anggota tubuh'
            ],
            [
                'STRESS',
                'Kesulitan untuk relaksasi/bersantai'
            ],
            [
                'KECEMASAN',
                'Cemas yang berlebihan dalam suatu situasi namun bisa lega jika hal/situasi itu berakhir'
            ],
            [
                'DEPRESI',
                'Pesimis'
            ],
            [
                'STRESS',
                'Mudah merasa kesal'
            ],
            [
                'STRESS',
                'Merasa banyak menghabiskan energi karena cemas'
            ],
            [
                'DEPRESI',
                'Merasa sedih dan depresi'
            ],
            [
                'STRESS',
                'Tidak sabaran'
            ],
            [
                'KECEMASAN',
                'Kelelahan'
            ],
            [
                'DEPRESI',
                'Kehilangan minat pada banyak hal (misal: makan, ambulasi, sosialisasi)'
            ],
            [
                'DEPRESI',
                'Merasa diri tidak layak'
            ],
            [
                'STRESS',
                'Mudah tersinggung'
            ],
            [
                'KECEMASAN',
                'Berkeringat (misal: tangan berkeringat) tanpa stimulasi oleh cuaca maupun latihan fisik'
            ],
            [
                'KECEMASAN',
                'Ketakutan tanpa alasan yang jelas'
            ],
            [
                'DEPRESI',
                'Merasa hidup tidak berharga'
            ],
            [
                'STRESS',
                'Sulit untuk beristirahat'
            ],
            [
                'KECEMASAN',
                'Kesulitan dalam menelan'
            ],
            [
                'DEPRESI',
                'Tidak dapat menikmati hal-hal yang saya lakukan'
            ],
            [
                'KECEMASAN',
                'Perubahan kegiatan jantung dan denyut nadi tanpa stimulasi oleh latihan fisik'
            ],
            [
                'DEPRESI',
                'Merasa hilang harapan dan putus asa'
            ],
            [
                'STRESS',
                'Mudah marah'
            ],
            [
                'KECEMASAN',
                'Mudah Panik'
            ],
            [
                'STRESS',
                'Kesulitan untuk tenang setelah sesuatu yang mengganggu'
            ],
            [
                'KECEMASAN',
                'Takut diri terhambat oleh tugas-tugas yang tidak biasa dilakukan'
            ],
            [
                'DEPRESI',
                'Sulit untuk antusias pada banyak hal'
            ],
            [
                'STRESS',
                'Sulit mentoleransi gangguan-gangguan terhadap hal yang sedang dilakukan'
            ],
            [
                'STRESS',
                'Berada pada keadaan tegang'
            ],
            [
                'DEPRESI',
                'Merasa tidak berharga'
            ],
            [
                'STRESS',
                'Tidak dapat memaklumi hal apapun yang menghalangi anda untuk menyelesaikan hal yang sedang Anda lakukan'
            ],
            [
                'KECEMASAN',
                'Ketakutan'
            ],
            [
                'DEPRESI',
                'Tidak ada harapan untuk masa depan'
            ],
            [
                'DEPRESI',
                'Merasa hidup tidak berarti',
            ],
            [
                'STRESS',
                'Mudah gelisah'
            ],
            [
                'KECEMASAN',
                'Khawatir dengan situasi saat diri Anda mungkin menjadi panik dan mempermalukan diri sendiri'
            ],
            [
                'KECEMASAN',
                'Gemetar'
            ],
            [
                'DEPRESI',
                'Sulit untuk meningkatkan inisiatif dalam melakukan sesuatu'
            ]
        ];
        foreach ($data as $record) {
            DB::table('aspek_penilaian')->insert([
                'kelompok' => $record[0],
                'pertanyaan' => $record[1],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
