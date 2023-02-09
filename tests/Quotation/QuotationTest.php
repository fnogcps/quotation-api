<?php

declare(strict_types=1);

namespace MiniaturePancake\Quotation;

use PHPUnit\Framework\TestCase;

class QuotationTest extends TestCase
{
    public function testGetDollarExchangeRate()
    {
        $api = new QuotationAPI();
        $this->assertIsFloat($api->getExchangeRate("BRL", "USD")['bid']);
    }
}
