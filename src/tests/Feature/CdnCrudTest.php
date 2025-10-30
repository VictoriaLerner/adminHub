<?php

namespace Tests\Feature;
use App\Models\Cdn;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CdnCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_can_view_cdns_index()
    {
        $cdn = Cdn::factory()->create();

        $response = $this->get(route('cdns.index'));

        $response->assertStatus(200);
        $response->assertSee($cdn->name);
    }

    public function test_can_create_cdn()
    {
        $data = [
            'name' => 'Test CDN',
            'login' => 'testlogin',
            'password' => 'secret123',
        ];

        $response = $this->post(route('cdns.store'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('cdns', ['name' => 'Test CDN', 'login' => 'testlogin']);
    }

    public function test_can_update_cdn()
    {
        $cdn = Cdn::factory()->create();

        $data = [
            'name' => 'Updated CDN',
            'login' => 'updatedlogin',
            'password' => 'newsecret',
        ];

        $response = $this->put(route('cdns.update', $cdn->id), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('cdns', ['id' => $cdn->id, 'name' => 'Updated CDN']);
    }

    public function test_can_delete_cdn()
    {
        $cdn = Cdn::factory()->create();

        $response = $this->delete(route('cdns.destroy', $cdn->id));

        $response->assertRedirect();
        $this->assertDatabaseMissing('cdns', ['id' => $cdn->id]);
    }
}
