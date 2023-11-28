<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CreateCustomerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     */
    public function testCreateStoreCustomer(): void
    {
        $user = User::factory()->create();
        
        $this->actingAs($user);

        $response = $this->post(route('its.app.customers.store'), [
            'name' => 'Eduardo Bessa',
            'email' => 'eduubessa@gmail.com',
            'birthday' => '1994-01-09',
            'address-line-1' => 'Rua Reguengos de Monsaraz',
            'address-line-2' => '23',
            'postcode' => '7005-399',
            'location' => 'Évora',
            'mobile' => '913946525'
        ]);

        $response->assertStatus(201);

        $this->assertDatabaseHas('customers', [
            'name' => 'Eduardo Bessa',
            'email' => 'eduubessa@gmail.com',
            'birthday' => '1994-01-09',
            'address-line-1' => 'Rua Reguengos de Monsaraz',
            'address-line-2' => '23',
            'postcode' => '7005-399',
            'location' => 'Évora',
            'mobile' => '913946525'
        ]);
    }
}
