<?php
namespace Birim\OpenAI;

use Exception;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class OpenAIClient
 * Official OpenAI documentation can be found here https://beta.openai.com/docs/introduction
 *
 * @package Birim\OpenAI
 * @author Birim Karaustaoglu
 * @link https://github.com/birim/php-openai
 */
class OpenAIClient
{
    /**
     * OpenAI Base uri
     *
     * @var string $baseUri
     */
    protected $baseUri = 'https://api.openai.com';

    /**
     * OpenAI API Version number
     *
     * @var string $version
     */
    protected $version = 'v1';

    /**
     * OpenAI API Key
     *
     * @var string $key
     */
    protected $key;

    /**
     * GuzzleHttp client object
     *
     * @var Client $client
     */
    protected $client;

    /**
     * OpenAIClient constructor.
     *
     * @param $key
     */
    public function __construct($key)
    {
        $this->key = $key;
        $this->client = new Client(['base_uri' => $this->baseUri]);
    }

    /**
     * GET query to OpenAI interface
     *
     * @param $endpoint
     * @return array
     */
    public function get($endpoint)
    {
        try {
            $guzzleResponse = $this->client->get($this->version . '/' . $endpoint, [
                'headers' => $this->requestHeader()
            ]);
            return $this->response($guzzleResponse->getBody()->getContents());
        } catch(GuzzleException $exception) {
            return $this->error($exception);
        } catch(Exception $exception) {
            return $this->error($exception);
        }
    }

    /**
     * DELETE query to OpenAI interface
     *
     * @param $endpoint
     * @return array
     */
    public function delete($endpoint)
    {
        try {
            $guzzleResponse = $this->client->delete($this->version . '/' . $endpoint, [
                'headers' => $this->requestHeader()
            ]);
            return $this->response($guzzleResponse->getBody()->getContents());
        } catch(GuzzleException $exception) {
            return $this->error($exception);
        } catch(Exception $exception) {
            return $this->error($exception);
        }
    }

    /**
     * POST query to OpenAI interface
     *
     * @param $endpoint
     * @param array $data
     * @param array $files
     * @return array
     */
    public function post($endpoint, array $data = [], array $files = [])
    {
        $options = [
            'headers' => $this->requestHeader()
        ];

        if ($data) {
            $options['json'] = $data;
        }

        if ($files) {
            $options['multipart'] = $files;
        }

        try {
            $guzzleResponse = $this->client->post($this->version . '/' . $endpoint, $options);
            return $this->response($guzzleResponse->getBody()->getContents());
        } catch(GuzzleException $exception) {
            return $this->error($exception);
        } catch(Exception $exception) {
            return $this->error($exception);
        }
    }

    /**
     * Standard error message from a request
     *
     * @param Exception $exception
     * @return array[]
     */
    protected function error(\Exception $exception)
    {
        return [
            'error' => [
                'message' => $exception->getMessage()
            ]
        ];
    }

    /**
     * Decode the content from a request response
     *
     * @param $string
     * @return mixed
     */
    protected function response($string)
    {
        return json_decode($string, true);
    }

    /**
     * HTTP Header for the request with the bearer token
     *
     * @return array
     */
    protected function requestHeader()
    {
        return [
            'Authorization' => 'Bearer ' . $this->key,
            'Content-Type' => 'application/json'
        ];
    }
}
