<?php

declare(strict_types=1);

namespace Harryqt\Trongrid\Requests;

class GetContractTransactionInfoByAccountAddressRequest extends BaseRequest
{
    public function __construct(
        public readonly string $address,
        public readonly string $contract = 'trc20',
        public readonly bool $only_confirmed = false,
        public readonly bool $only_unconfirmed = false,
        public readonly int $limit = 20,
        public readonly ?string $fingerprint = null,
        public readonly ?string $order_by = null,
        public readonly ?int $min_timestamp = null,
        public readonly ?int $max_timestamp = null,
        public readonly ?string $contract_address = 'TR7NHqjeKQxGTCi8q8ZY4pL8otSzgjLj6t',
        public readonly bool $only_to = false,
        public readonly bool $only_from = false,
    ) {
    }

    public function resolveEndpoint(): string
    {
        return '/accounts/'.$this->address.'/transactions/'.$this->contract;
    }
}
