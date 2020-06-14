<?php

namespace Tests\Feature\Dashboard\Customer;

use App\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\Dashboard\CreateUser;
use Tests\TestCase;

class EnquiryTest extends TestCase
{
    use CreateUser;

    protected function getUserType()
    {
        return 'customer';
    }

    public function test_customer_can_view_enquiry_creation()
    {
        $response = $this->get(route('dashboard.customer.enquiries.create', [], false));

        $response->assertSuccessful();
        $response->assertViewIs('dashboard.customer.enquiries.create');
    }

    public function test_customer_can_create_enquiry()
    {
        $category = factory(Category::class)->state('product')->create();
        $response = $this->post(route('dashboard.customer.enquiries.store', [], false), [
            'type' => 'product',
            'category_id' => $category->id,
            'title' => 'Test',
            'description' => 'Lorem ipsum',
        ]);

        $response->assertRedirect(route('dashboard.customer.index', [], false));
    }

}
