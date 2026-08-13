<?php

declare(strict_types=1);

namespace Harryqt\Trongrid\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

abstract class BaseRequest extends Request
{
    protected Method $method = Method::GET;

    protected array $queryParameterExcludes = [];

    protected function defaultQuery(): array
    {
        return $this->getConstructorParams();
    }

    protected function getConstructorParams(): array
    {
        $parameters = [];

        foreach ((new \ReflectionClass($this))->getConstructor()->getParameters() as $param) {
            $name = $param->getName();

            if (in_array($name, $this->queryParameterExcludes)) {
                continue;
            }

            $parameters[$name] = $this->{$name};
        }

        return $parameters;
    }
}
