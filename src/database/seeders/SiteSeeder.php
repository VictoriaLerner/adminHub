<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Site;
class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sites = [
            ['domain' => 'demo.wpjobopenings.com',  'admin_url' => 'https://demo.wpjobopenings.com/wp-login.php'],
            ['domain' => 'example2.com',  'admin_url' => 'https://example2.com/wp-admin'],
            ['domain' => 'example3.com',  'admin_url' => 'https://example3.com/wp-admin'],
            ['domain' => 'example4.com',  'admin_url' => 'https://example4.com/wp-admin'],

        ];

        foreach ($sites as $site) {
            Site::create($site);
        }
    }
}
