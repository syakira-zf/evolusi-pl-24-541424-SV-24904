<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Pastikan folder penyimpanan service tersedia
        Storage::disk('public')->makeDirectory('services');

        $services = [
            [
                'name' => 'Regular Makeup',
                'price' => 225000,
                'description' => 'Makeup natural dan fresh untuk acara wisuda, kondangan, photoshoot, maupun acara spesial lainnya. Cocok untuk kamu yang ingin tampil cantik dengan hasil yang tetap ringan dan nyaman.',
                'source_image' => database_path('seeders/assets/services/regular.webp'),
                'image' => 'services/regular.webp',
            ],
            [
                'name' => 'Premium Makeup',
                'price' => 345000,
                'description' => 'Makeup dengan hasil yang lebih flawless dan detail menggunakan produk pilihan. Cocok untuk engagement, lamaran, prewedding, maupun acara spesial yang membutuhkan tampilan lebih elegan dan tahan lama.',
                'source_image' => database_path('seeders/assets/services/premium.jpg'),
                'image' => 'services/premium.jpg',
            ],
            [
                'name' => 'Bridal Makeup',
                'price' => 475000,
                'description' => 'Makeup khusus pengantin dengan hasil elegan, flawless, dan tahan lama untuk menunjang penampilan di hari spesial. Riasan disesuaikan dengan karakter wajah dan konsep pernikahan agar tetap terlihat cantik dan berkelas.',
                'source_image' => database_path('seeders/assets/services/bridal.jpg'),
                'image' => 'services/bridal.jpg',
            ],
        ];

        foreach ($services as $service) {
            if (File::exists($service['source_image'])) {
                Storage::disk('public')->put(
                    $service['image'],
                    File::get($service['source_image'])
                );
            }

            Service::updateOrCreate(
                ['name' => $service['name']],
                [
                    'price' => $service['price'],
                    'description' => $service['description'],
                    'image' => $service['image'],
                ]
            );
        }
    }
}