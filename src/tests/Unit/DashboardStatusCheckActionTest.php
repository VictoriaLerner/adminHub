<?php


namespace Tests\Unit;

use App\Dashboard\Actions\DashboardStatusCheckAction;
use App\Models\Site;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class DashboardStatusCheckActionTest extends TestCase
{
    public function test_returns_online_if_site_responds_200()
    {
        Http::fake([
            'https://demo.wpjobopenings.com/wp-login.php' => Http::response('', 200),
        ]);

        $site = new Site(['admin_url' => 'https://demo.wpjobopenings.com/wp-login.php']);
        $action = new DashboardStatusCheckAction();

        $result = $action->execute($site);

        $this->assertIsArray($result);
        $this->assertEquals('success', $result['type']);
        $this->assertStringContainsString('ONLINE', $result['message']);
    }


}
