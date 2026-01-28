<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CurrencyConverterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_currency_converter_page()
    {
        $response = $this->get('/currency-converter');

        $response->assertStatus(200);
        $response->assertViewIs('currency.converter');
    }

    /** @test */
    public function it_returns_supported_currencies()
    {
        $response = $this->get('/currencies');

        $response->assertStatus(200);
        $response->assertJsonStructure([
            '*' => [
                '*' => 'string'
            ]
        ]);
    }

    /** @test */
    public function it_converts_currency()
    {
        $response = $this->post('/currency-convert', [
            'amount' => 100,
            'from_currency' => 'USD',
            'to_currency' => 'EUR'
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'success',
            'original_amount',
            'from_currency',
            'to_currency',
            'converted_amount',
            'exchange_rate'
        ]);
    }
}