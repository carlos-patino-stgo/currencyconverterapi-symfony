<?php


namespace App\Service;

use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class FreeCurrconvService
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }

    /**
     * @param String $from_currency
     * @param String $to_currency
     * @return string
     */
    public function convertCurrency(
        string $from_currency,
        string $to_currency
    ): string
    {
        $fromTo = $from_currency . '_' . $to_currency;

        try {
            $response = $this->client->request(
                'GET',
                'https://free.currconv.com/api/v7/convert?q=' .$fromTo. '&compact=ultra&apiKey=' . $_ENV['FREE_CURRCONV_API_KEY']
            );
            $content = $response->toArray();
            return $content[$fromTo];
        } catch (ClientExceptionInterface | DecodingExceptionInterface | RedirectionExceptionInterface | ServerExceptionInterface | TransportExceptionInterface $e) {
            return $e->getMessage();
        }
    }
}