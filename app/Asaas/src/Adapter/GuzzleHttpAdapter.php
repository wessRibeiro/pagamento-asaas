<?php
namespace App\Asaas\Adapter;


// Asaas
use App\Asaas\Exception\HttpException;

// GuzzleHttp
use GuzzleHttp\Client;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;



/**
 * Guzzle Http Adapter
 *
 * @author Agência Softr <agencia.softr@gmail.com>
 */
class GuzzleHttpAdapter implements AdapterInterface
{
    /**
     * Client Instance
     *
     * @var ClientInterface
     */
    protected $client;

    /**
     * Command Response
     *
     * @var Response|GuzzleHttp\Message\ResponseInterface
     */
    protected $response;

    public function __construct()
    {
        $this->client = new Client(['headers' => ['access_token' => env('ASAAS_API_KEY')]]);
    }

    /**
     * {@inheritdoc}
     */
    public function get($url)
    {
        try
        {
            $this->response = $this->client->get($url);
        }
        catch(RequestException $e)
        {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function delete($url)
    {
        try
        {
            $this->response = $this->client->delete($url);
        }
        catch(RequestException $e)
        {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function put($url, $content = '')
    {
        $options = [];
        $options['body'] = $content;

        try
        {
            $this->response = $this->client->put($url, $options);
        }
        catch(RequestException $e)
        {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function post($url, $content = '')
    {
        $options = [];
        $options['form_params'] = $content;

        try
        {
            $this->response = $this->client->post($url, $options);
        }
        catch(RequestException $e)
        {
            $this->response = $e->getResponse();

            $this->handleError();
        }

        return $this->response->getBody();
    }

    /**
     * {@inheritdoc}
     */
    public function getLatestResponseHeaders()
    {
        if(null === $this->response)
        {
            return;
        }

        return [
            'reset'     => (int) (string) $this->response->getHeader('RateLimit-Reset'),
            'remaining' => (int) (string) $this->response->getHeader('RateLimit-Remaining'),
            'limit'     => (int) (string) $this->response->getHeader('RateLimit-Limit'),
        ];
    }

    /**
     * @throws HttpException
     */
    protected function handleError()
    {
        $body = (string) $this->response->getBody();
        $code = (int) $this->response->getStatusCode();

        $content = json_decode($body);

        throw new HttpException(isset($content->message) ? $content->message : 'Request not processed.', $code);
    }
}
