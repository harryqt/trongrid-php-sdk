<?php

declare(strict_types=1);

namespace Harryqt\Trongrid\Requests;

use Psr\Http\Message\RequestInterface;
use Saloon\Enums\Method;
use Saloon\Http\PendingRequest;

/**
 * Query block header information or entire block information
 * according to block height or block hash. (Confirmed state)
 */
class GetBlockRequest extends BaseRequest
{
    protected Method $method = Method::POST;

    public function __construct(
        protected readonly int|string|null $id_or_num = null,
        protected readonly bool $detail = false,
    ) {}

    public function resolveEndpoint(): string
    {
        return '/walletsolidity/getblock';
    }

    /**
     * Dynamically strip '/v1' from the connector's base URL
     * Intercept and safely rewrite the compiled PSR-7 URI
     */
    public function handlePsrRequest(RequestInterface $request, PendingRequest $pendingRequest): RequestInterface
    {
        $uri = $request->getUri();
        $path = $uri->getPath(); // returns e.g. "/v1/walletsolidity/getblock"

        // Strip out the leading /v1 if it exists
        if (str_starts_with($path, '/v1')) {
            $newPath = substr($path, 3); // removes "/v1"
            $uri = $uri->withPath($newPath);
        }

        // Return the modified request with the new URI
        return $request->withUri($uri);
    }
}
