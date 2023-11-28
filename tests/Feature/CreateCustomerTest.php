<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class CreateCustomerTest extends TestCase
{
    use WithoutMiddleware;

    /**
     * A basic feature test example.
     */
    public function testCreateStoreCustomer(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post(route('its.app.customers.store'), [
            '_token' => '7OnuAjtJW2BbJUI6QahuNg63FwyOxP7h18GngEHm',
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
