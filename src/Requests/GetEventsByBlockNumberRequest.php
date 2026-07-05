<?php

declare(strict_types=1);

namespace Harryqt\Trongrid\Requests;

use Saloon\PaginationPlugin\Contracts\Paginatable;

class GetEventsByBlockNumberRequest extends BaseRequest implements Paginatable
{
    public function __construct(
        protected readonly int|string $block_number,
        protected readonly bool $only_confirmed = false,
        protected readonly int $limit = 20,
        protected readonly ?string $fingerprint = null,
    ) {}

    public function resolveEndpoint(): string
    {
        return "/blocks/$this->block_number/events";
    }
}
