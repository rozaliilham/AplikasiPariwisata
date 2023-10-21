<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class settingseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $set = [
            'web'   => 'Pariwisata System',
            'keyword'   => 'Pariwisata',
            'logo'  => 'icon.png',
            'alamat'    => 'Indonesia',
            'telp'    => '081295916567',
            'email'    => 'admin@admin.com',
            'lat'    => '-6.164307388131689',
            'lng'    => '106.83192368082808',
            'created_at'    => now(),
        ];
        Setting::create($set);
    }
}
