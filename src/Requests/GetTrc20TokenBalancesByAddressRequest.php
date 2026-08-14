<?php

declare(strict_types=1);

namespace Harryqt\Trongrid\Requests;

use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetTrc20TokenBalancesByAddressRequest extends BaseRequest implements Paginatable
{
    protected array $queryParameterExcludes = [
        'address',
    ];

    public function __construct(
        protected readonly string $address,
        protected readonly string $contract_address = 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t',
        protected readonly int $limit = 20,
        protected readonly ?string $fingerprint = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accounts/$this->address/trc20/balance";
    }
}
