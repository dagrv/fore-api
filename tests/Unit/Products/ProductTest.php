<?php

namespace Tests\Unit\Products;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use App\Models\ProductVariation;
use Tests\TestCase;

class ProductTest extends TestCase {
    public function test_it_uses_slug_for_route_key_name() {
        $product = new Product();

        $this->assertEquals($product->getRouteKeyName(), 'slug');
    }

    public function test_it_has_many_categories() {
        $product = factory(Product::class)->create();

        $product->categories()->save(
            factory(Category::class)->create()
        );

        $this->assertInstanceOf(Category::class, $product->categories->first());
    }

    public function test_it_has_many_variations() {
        $product = factory(Product::class)->create();

        $product->variations()->save(
            factory(ProductVariation::class)->create()
        );

        $this->assertInstanceOf(ProductVariation::class, $product->variations->first());
    }
}
