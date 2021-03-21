<?php

namespace Tests\Unit\Products;

use App\Cart\Money;
use App\Models\Product;
use App\Models\ProductVariation;
use App\Models\ProductVariationType;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;

class ProductVariationTest extends TestCase {
    public function test_it_has_one_variation_type() {
        $variation = factory(ProductVariation::class)->create();
        $this->assertInstanceOf(ProductVariationType::class, $variation->type);
    }

    public function test_it_belongs_to_a_product() {
        $variation = factory(ProductVariation::class)->create();
        $this->assertInstanceOf(Product::class, $variation->product);
    }

    public function test_it_return_money_instance_for_the_price() {
        $variation = factory(ProductVariation::class)->create();
        $this->assertInstanceOf(Money::class, $variation->price);
    }

    public function test_it_return_formatted_price() {
        $variation = factory(ProductVariation::class)->create([
            'price' => 1000
        ]);

        $this->assertEquals($variation->formattedPrice, '10,00 €');
    }

    public function test_it_return_product_price_if_price_is_null() {
        $product = factory(Product::class)->create([
            'price' => 1000
        ]);

        $variation = factory(ProductVariation::class)->create([
            'price' => null,
            'product_id' => $product->id
        ]);

        $this->assertEquals($product->price->amount(), $variation->price->amount());
    }

    public function test_it_can_check_if_variation_price_is_different_from_product() {
        $product = factory(Product::class)->create([
            'price' => 1000
        ]);

        $variation = factory(ProductVariation::class)->create([
            'price' => 2000,
            'product_id' => $product->id
        ]);

        $this->assertTrue($variation->priceVaries());
    }
}