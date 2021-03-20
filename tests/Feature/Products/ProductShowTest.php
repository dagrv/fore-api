<?php

namespace Tests\Feature\Products;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductShowTest extends TestCase {
    public function test_it_fails_if_product_cannot_be_found() {
        $this->json('GET', 'api/products/nothing')->assertStatus(404);
    }

    public function test_it_shows_the_correct_product() {
        $product = factory(Product::class)->create();
        
        $this->json('GET', "api/products/{$product->slug}")->assertJsonFragment([
            'id' => $product->id
        ]);
    }
}
