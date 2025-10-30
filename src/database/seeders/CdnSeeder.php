<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Cdn;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;

class CdnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cdns = [
            ['name' => 'Cloudflare', 'login' => 'cf_user', 'password' => 'secret1'],
            ['name' => 'AWS CloudFront', 'login' => 'aws_user', 'password' => 'secret2'],
            ['name' => 'Fastly', 'login' => 'fastly_user', 'password' => 'secret3'],
            ['name' => 'Akamai', 'login' => 'akamai_user', 'password' => 'secret4'],
            ['name' => 'KeyCDN', 'login' => 'keycdn_user', 'password' => 'secret5'],
        ];

        foreach ($cdns as $cdn) {
            Cdn::create([
                'name' => $cdn['name'],
                'login' => $cdn['login'],
                'password' => Crypt::encryptString($cdn['password']),
            ]);
        }
    }
}
