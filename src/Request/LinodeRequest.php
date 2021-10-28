<?php

namespace SamuelMwangiW\Linode\Request;

use Illuminate\Http\Client\Response;
use JustSteveKing\StatusCode\Http;
use JustSteveKing\Transporter\Request;
use SamuelMwangiW\Linode\Exceptions\CredentialsMissing;

class LinodeRequest extends Request
{
    protected string $method = 'GET';

    /**
     * @throws \Illuminate\Http\Client\RequestException
     * @throws CredentialsMissing
     */
    public function fetch(): Response
    {
        $this->checkIfTesting();

        $this->authenticate();

        $response = $this->send();

        if ($response->failed()) {
            throw $response->toException();
        }

        return $response;
    }

    /**
     * @throws CredentialsMissing
     */
    public function authenticate(): void
    {
        $token = value(config('linode.token'));

        if (empty($token)) {
            throw new CredentialsMissing("Cannot authenticate to Linode without a token");
        }

        $this->request
            ->baseUrl(
                url: $this->baseUrl()
            )
            ->withToken(
                token: $token,
            )->withHeaders(
                headers: [
                    'Accept' => 'application/json',
                ]
            )->withUserAgent(
                userAgent: "PHP Linode SDK v0.0.1",
            );
    }

    public function baseUrl(): string
    {
        return config('linode.endpoint') ?? $this->baseUrl;
    }

    private function checkIfTesting()
    {
        if (config('linode.environment') === 'testing') {
            $this->useFake = true;
            $this->status = Http::OK;

            $this->fakeData = $this->getFakeData();
        }
    }

    private function getFakeData(): mixed
    {
        $method = strtolower($this->method);

        $path = "tests/Fixtures/{$method}/{$this->path()}.json";

        return (array)json_decode(file_get_contents(__DIR__ . "/../../$path"));
    }
}
