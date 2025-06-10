<?php

declare(strict_types=1);

namespace Harryqt\Trongrid;

use Saloon\Http\Connector;
use Saloon\Http\Request;
use Saloon\Http\Response;
use Saloon\PaginationPlugin\Contracts\HasPagination;
use Saloon\PaginationPlugin\Paginator;

class TrongridConnector extends Connector implements HasPagination
{
    public function __construct(public readonly string $token) {}

    public function resolveBaseUrl(): string
    {
        return 'https://api.trongrid.io/v1';
    }

    public function paginate(Request $request): Paginator
    {
        return new class(connector: $this, request: $request) extends Paginator
        {
            protected function isLastPage(Response $response): bool
            {
                return $response->json('meta.links.next') === null;
            }

            protected function getPageItems(Response $response, Request $request): array
            {
                return $response->json('data');
            }

            protected function applyPagination(Request $request): Request
            {
                if ($this->currentResponse) {
                    $request->query()->add('fingerprint', $this->currentResponse->json('meta.fingerprint'));
                }

                return $request;
            }
        };
    }

    protected function defaultHeaders(): array
    {
        return [
            'Accept' => 'application/json',
            'Tron-Pro-Api-Key' => $this->token,
        ];
    }
}
