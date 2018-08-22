<?php
declare(strict_types=1);

namespace App\ExceptionHandler;

use Xervice\ExceptionHandler\ExceptionHandlerDependencyProvider as XerviceExceptionHandlerDependencyProvider;
use XerviceTest\ExceptionHandler\TestInjector\TestHandler;
use XerviceTest\ExceptionHandler\TestInjector\TestRegistrar;

class ExceptionHandlerDependencyProvider extends XerviceExceptionHandlerDependencyProvider
{
    /**
     * @return \Xervice\ExceptionHandler\Business\Model\Handler\ExceptionHandlerInterface[]
     */
    public function getExceptionHandler(): array
    {
        return [
            new TestHandler()
        ];
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Model\Register\RegisterInterface[]
     */
    public function getExceptionRegister(): array
    {
        return [
            new TestRegistrar()
        ];
    }


}
