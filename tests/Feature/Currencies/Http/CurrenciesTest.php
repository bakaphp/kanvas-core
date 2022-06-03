<?php

namespace Tests\Feature\Currencies\Http;

use Tests\TestCase;

class CurrenciesTest extends TestCase
{
    /**
     * Get all currencies.
     *
     * @return void
     */
    public function getAllCurrencies()
    {
        $response = $this->get('/currencies');

        $response->assertStatus(200);
    }
}
