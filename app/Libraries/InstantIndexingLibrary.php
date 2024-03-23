<?php

namespace App\Libraries;

use Google\Client;
use Google\Exception;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\GuzzleException;
use Nette\Utils\Json;
use Nette\Utils\JsonException;

class InstantIndexingLibrary
{

    protected Client $client;
    protected ClientInterface|\GuzzleHttp\Client $httpClient;
    protected string $endpoint;

    /**
     * @throws Exception
     */
    public function __construct()
    {
        $this->client = new Client();
        $this->client->setAuthConfig(ROOT_DIR . 'auth.json');
        $this->client->addScope('https://www.googleapis.com/auth/indexing');
        $this->httpClient = $this->client->authorize();
        $this->endpoint = 'https://indexing.googleapis.com/v3/urlNotifications:publish';
    }

    /**
     * @throws JsonException|GuzzleException
     */
    public function indexUrl($url): int
    {
        // Define contents here. The structure of the content is described in the next step.
        $content = Json::encode([
            'url' => $url,
            'type' => 'URL_UPDATED'
        ]);

        $response = $this->httpClient->post($this->endpoint, ['body' => $content]);
        return $response->getStatusCode();
    }

}
