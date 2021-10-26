<?php

namespace SamuelMwangiW\Linode\Request;

use Illuminate\Http\Client\Response;
use JustSteveKing\StatusCode\Http;
use JustSteveKing\Transporter\Request;
use SamuelMwangiW\Linode\Exceptions\CredentialsMissing;

class LinodeRequest extends Request
{
    protected string $method = 'GET';

    protected array $data = [];

    /**
     * @throws CredentialsMissing
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function fetch(): Response
    {
        if (empty(config('linode.token'))) {
            throw new CredentialsMissing("Cannot authenticate to Linode without a token");
        }

        $this->request
            ->baseUrl(
                url: $this->baseUrl()
            )
            ->withToken(
                token: config('linode.token'),
            )->withHeaders(
                headers: [
                    'Accept' => 'application/json',
                ]
            )->withUserAgent(
                userAgent: "PHP Linode SDK v0.0.1",
            );

        $this->setFakeData();

        $response = $this->getResponse();

        if ($response->failed()) {
            throw $response->toException();
        }

        return $response;
    }

    public function baseUrl(): string
    {
        return config('linode.endpoint') ?? $this->baseUrl;
    }

    public function getResponse()
    {
        return $this->send();
    }

    private function setFakeData()
    {
        if(config('linode.environment') === 'testing'){
            $this->useFake = true;
            $this->status = Http::OK;

            $this->fakeData = $this->getFakeData();
        }
    }

    private function getFakeData(): mixed
    {
        $method = strtolower($this->method);

        $path = "tests/Fixtures/{$method}/{$this->path()}.json";

        return (array)json_decode(file_get_contents(__DIR__."/../../$path"));
    }
}
