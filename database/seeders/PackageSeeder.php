<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $packages = [
            [
                'title' => 'Breeze',
                'url' => 'https://laravel.com/docs/8.x/starter-kits#laravel-breeze'
            ],
            [
                'title' => 'Dusk',
                'url' => 'https://laravel.com/docs/8.x/dusk'
            ],
            [
                'title' => 'Horizon',
                'url' => 'https://laravel.com/docs/8.x/horizon'
            ],
            [
                'title' => 'Passport',
                'url' => 'https://laravel.com/docs/8.x/passport'
            ],
            [
                'title' => 'Sail',
                'url' => 'https://laravel.com/docs/8.x/sail'
            ]
        ];
        foreach ($packages as $key => $row) {
            Package::firstOrCreate([
                'title' => $row['title'],
                'documentation_url'       => $row['url']
            ]);
        }
    }
}
