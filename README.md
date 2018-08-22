ExceptionHandler
=====================

[![Build Status](https://travis-ci.org/xervice/exception-handler.svg?branch=master)](https://travis-ci.org/xervice/exception-handler)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/xervice/exception-handler/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/xervice/exception-handler/?branch=master)
[![Code Coverage](https://scrutinizer-ci.com/g/xervice/exception-handler/badges/coverage.png?b=master)](https://scrutinizer-ci.com/g/xervice/exception-handler/?branch=master)


Installation
-----------------
```
composer require xervice/exception-handler
```

Configuration
-----------------

You have to add the ExceptionService to your kernel stack.

After that the defined registers will be executed. To define a register you have to overwrite the DependencyProvider:
```php
<?php

namespace App\ExceptionHandler;

use Xervice\ExceptionHandler\ExceptionHandlerDependencyProvider as XerviceExceptionHandlerDependencyProvider;

class ExceptionHandlerDependencyProvider extends XerviceExceptionHandlerDependencyProvider
{
    /**
     * @return \Xervice\ExceptionHandler\Business\Model\Register\RegisterInterface[]
     */
    public function getExceptionRegister(): array
    {
        return [
            new MyExceptionRegsiter() // implements RegisterInterface
        ];
    }
}
```

You can define the default "ExceptionHandlerRegister". If you use it, you can define own ExceptionHandler. Every ExceptionHandler get automatically exexpected exceptions.
You can define your ExceptionHandler also in the Dependency Provider.

```php
<?php

namespace App\ExceptionHandler;

use Xervice\ExceptionHandler\ExceptionHandlerDependencyProvider as XerviceExceptionHandlerDependencyProvider;

class ExceptionHandlerDependencyProvider extends XerviceExceptionHandlerDependencyProvider
{
    /**
     * @return \Xervice\ExceptionHandler\Business\Model\Handler\ExceptionHandlerInterface[]
     */
    public function getExceptionHandler(): array
    {
        return [
            new MyExceptionHandler() // implements ExceptionHandlerInterface
        ];
    }
}
```

Usage
--------

Also you can parse your own exception by using the Facade:

```php
$exceptionHandlerFacade->handleException($exception);

This will loop all defined ExceptionHandler with the given exception.
```
