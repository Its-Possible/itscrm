<?php

namespace Tests\Feature;

use App\Models\Customer;
use App\Models\Tag;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CustomerTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @return void
     */
    public function test_all_customers(): void
    {
        $response = $this->get('/api/customers');

        $response->assertStatus(201)
            ->assertJson([
                'message' => 'Lista de todos os clientes'
            ]);
    }

    /**
     * @return void
     */
    public function test_get_customer()
    {
        $customer = Customer::factory()->create();

        $response = $this->get("/api/customers/{$customer->slug}");
        $response->assertOk()
            ->assertStatus(200);

        $response->assertSee($customer->name);
        $response->assertSee($customer->email);
        $response->assertSee($customer->slug);
    }

    public function test_create_customer(): void
    {
        $data = [
            "name" => "Eduardo Bessa",
            "email" => "eduubessa@gmail.com",
            "phone" => 913946525,
            "vat" => "PT271651245"
        ];

        $response = $this->post('/api/customers', $data);

        $response->assertStatus(201);
    }

    /**
     * Test attach tags to customers
     */
    public function test_attach_tags(): void
    {
        $customers = Customer::factory()->count(5)->create();
        $tags = Tag::factory()->count(3)->create();

        foreach($customers as $customer) {
            $customer->tags()->attach($tags->pluck('id'));
            $this->assertEquals(3, $customer->tags->count());
            $this->assertInstanceOf(Tag::class, $customer->tags->first());
        }

        foreach($tags as $tag) {
            $this->assertEquals(3, $customer->tags->count());
            $this->assertInstanceOf(Tag::class, $customer->tags->first());
        }
    }
}
