<?php

declare(strict_types=1);

namespace API\Quotation;

use PHPUnit\Framework\TestCase;

class QuotationTest extends TestCase
{
    private $api;
    public function setUp(): void
    {
        $this->api = new QuotationAPI();
    }
    public function assertPreConditions(): void
    {
        $this->assertTrue(class_exists('API\Quotation\QuotationAPI'));
    }
    public function testGetDollarExchangeRate()
    {
        $this->assertIsFloat($this->api->getExchangeRate("BRL", "USD")['bid']);
    }
}
