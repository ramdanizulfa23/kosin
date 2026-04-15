<?php

namespace Database\Seeders;

use App\Models\Testimonial;
use App\Models\BoardingHouse;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TestimonialSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID'); // Pake locale Indonesia biar namanya lokal banget
        $boardingHouses = BoardingHouse::all();

        if ($boardingHouses->isEmpty()) {
            $this->command->info('Gak ada kosan, seeder testimonial dilewati.');
            return;
        }

        // List komentar biar testimoninya nyambung sama anak kos
        $comments = [
            'Tempatnya bersih banget, deket sama warung makan juga.',
            'Wifi kenceng, cocok buat nugas sampai pagi.',
            'Ibu kosnya baik banget, sering dikasih cemilan gratis!',
            'Kamar mandinya bersih, sirkulasi udara juga oke.',
            'Aman banget, ada CCTV 24 jam dan parkir luas.',
            'Dekat kampus, jalan kaki cuma 5 menit sampai.',
            'Suasananya tenang, gak berisik, enak buat belajar.',
            'Harga segini udah dapet fasilitas lengkap, worth it parah!',
            'Sesuai sama foto, gak nyesel booking di sini.',
            'Proses booking lewat aplikasi ini gampang banget dan sat-set.'
        ];

        foreach ($boardingHouses as $kos) {
            // Kita bikin jumlah acak antara 5 sampai 10 testi per kosan
            $jumlahTesti = rand(5, 10);

            for ($i = 0; $i < $jumlahTesti; $i++) {
                Testimonial::create([
                    'boarding_house_id' => $kos->id,
                    'name'    => $faker->name,
                    'rating'  => rand(4, 5), // Kita set rating 4-5 aja biar kosannya kelihatan bagus
                    'content' => $faker->randomElement($comments),
                    'photo'   => 'testimonials/' . rand(1, 5) . '.jpg' // Asumsi lu punya placeholder foto 1-5
                ]);
            }
        }

        $this->command->info('Mantap! Testimonial udah rame sekarang.');
    }
}
