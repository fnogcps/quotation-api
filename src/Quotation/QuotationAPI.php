<?php

declare(strict_types=1);

namespace MiniaturePancake\Quotation;

class QuotationAPI
{
    private string $base_url = "https://economia.awesomeapi.com.br";
    private $conn;

    public function initCurl(string $endpoint)
    {
        $url = "{$this->base_url}/{$endpoint}";
        $this->conn = curl_init($url);
        curl_setopt_array($this->conn, [
            CURLOPT_URL, $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_SSL_VERIFYHOST => false,
            CURLOPT_SSL_VERIFYPEER => false,
            CURLOPT_CONNECTTIMEOUT => 60,
            CURLOPT_TIMEOUT        => 60,
        ]);

        $res = curl_exec($this->conn);
        curl_close($this->conn);
        return $res;
    }

    public function getExchangeRate(string $first_coin, string $second_coin): array
    {
        $index = "{$first_coin}{$second_coin}";
        $coins = json_decode($this->initCurl("last/{$first_coin}-{$second_coin}"));
        return [
            "bid" => (float) $coins->$index->bid,
            "ask" => (float) $coins->$index->ask
        ];
    }
}
