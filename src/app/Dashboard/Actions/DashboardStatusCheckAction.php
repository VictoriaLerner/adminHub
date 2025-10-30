<?php

namespace App\Dashboard\Actions;

use App\Models\Site;

class DashboardStatusCheckAction
{

    public function execute(Site $site): array
    {
        $url = $site->admin_url;

        try {
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_NOBODY, true);
            curl_setopt($ch, CURLOPT_TIMEOUT, 5);
            curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
            curl_exec($ch);
            $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
            curl_close($ch);

            $status = ($httpCode >= 200 && $httpCode < 400) ? 'online' : 'offline';
            $flashType = $status === 'online' ? 'success' : 'error';
            $message = "Site {$site->domain} is " . strtoupper($status);

        } catch (\Exception $e) {
            $flashType = 'error';
            $message = "Failed to check {$site->domain}";
        }

        return [
            'type' => $flashType,
            'message' => $message
        ];
    }
}
