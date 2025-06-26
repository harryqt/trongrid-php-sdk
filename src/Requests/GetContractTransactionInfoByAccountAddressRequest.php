<?php

declare(strict_types=1);

namespace Harryqt\Trongrid\Requests;

use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetContractTransactionInfoByAccountAddressRequest extends BaseRequest implements Paginatable
{
    public function __construct(
        protected readonly string $address,
        protected readonly string $contract = 'trc20',
        protected readonly bool $only_confirmed = false,
        protected readonly bool $only_unconfirmed = false,
        protected readonly int $limit = 20,
        protected readonly ?string $fingerprint = null,
        protected readonly ?string $order_by = null,
        protected readonly ?int $min_timestamp = null,
        protected readonly ?int $max_timestamp = null,
        protected readonly ?string $contract_address = 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t',
        protected readonly bool $only_to = false,
        protected readonly bool $only_from = false,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/accounts/$this->address/transactions/$this->contract";
    }
}
