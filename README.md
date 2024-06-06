[Trongrid](https://www.trongrid.io) PHP SDK built using [Saloon](https://github.com/saloonphp/saloon).

## Install

```sh
composer require harryqt/trongrid-php-sdk
```

## Usage

```php
use Harryqt\Trongrid\Connector;
use Harryqt\Trongrid\Requests\GetContractTransactionInfoByAccountAddressRequest;

$connector = new Connector('token');
$response = $connector->send(new GetContractTransactionInfoByAccountAddressRequest);

dd($response->body());
```

## Hyperf

Use `HyperfConnector` for coroutineization of the HTTP client when using on [Hyperf](https://github.com/hyperf/hyperf) framework.

```php
use GuzzleHttp\HandlerStack;
use Hyperf\Guzzle\CoroutineHandler;
use Harryqt\Trongrid\Connector;
use Saloon\Http\Senders\GuzzleSender;

class HyperfConnector extends Connector
{
    public function __construct(public readonly string $token)
    {
        /** @var GuzzleSender $sender */
        $sender = $this->sender();
        $sender->setHandlerStack(HandlerStack::create(new CoroutineHandler()));
    }
}
```
