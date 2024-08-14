<?php

declare(strict_types=1);

namespace App\Controller\Api\ExchangeRate;

use App\Kernel\Controller\Controller;
use SimpleXMLElement;

class ApiGetExchangeRateController extends Controller
{
    public function execute()
    {
        $exchangeDate = ($this->request()->post['exchangeDate']) ? date(
            'd/m/Y',
            $this->request()->post['exchangeDate']
        ) : date(
            'd/m/Y'
        );

        $url = 'http://www.cbr.ru/scripts/XML_daily.asp?date_req=' . $exchangeDate;
        $content = file_get_contents($url);
        $xml = new SimpleXMLElement($content);

        foreach ($xml->Valute as $value) {
            if (isset($value->CharCode) && $value->CharCode == 'USD') {
                $rate = str_replace(',', '.', (string)$value->Value);
                $rate = (float)$rate;
            }
        }

        $this->response()->send(
            content: json_encode([
                'date' => $exchangeDate,
                'rate' => $rate ?? null,
            ]),
            headers: ['Content-Type' => 'application/json']
        );
    }
}