<?php

declare(strict_types=1);

namespace Harryqt\Trongrid\Requests;

use Saloon\Enums\Method;

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
}
