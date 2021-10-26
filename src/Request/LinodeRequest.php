<?php

namespace SamuelMwangiW\Linode\Request;

use Illuminate\Http\Client\Response;
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

        $response = $this->send();

        if ($response->failed()) {
            throw $response->toException();
        }

        return $response;
    }

    public function baseUrl(): string
    {
        return config('linode.endpoint') ?? $this->baseUrl;
    }
}
