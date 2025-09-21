# Trongrid PHP SDK

[Trongrid](https://www.trongrid.io) PHP SDK built using [Saloon](https://github.com/saloonphp/saloon).

## Install

```sh
composer require harryqt/trongrid-php-sdk
```

## Usage

```php
use Harryqt\Trongrid\TrongridConnector;
use Harryqt\Trongrid\Requests\GetContractTransactionInfoByAccountAddressRequest;

$connector = new TrongridConnector('token');
$request = new GetContractTransactionInfoByAccountAddressRequest(
    address: 'TS2GiCi3duopsEkdMhaSXS7zPjNt9ydbvi',
    only_confirmed: true
);
$response = $connector->send($request);

print_r($response->body());
```
