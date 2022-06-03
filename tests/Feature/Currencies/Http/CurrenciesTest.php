<?php

namespace Tests\Feature;

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
