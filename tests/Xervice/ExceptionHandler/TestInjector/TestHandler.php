<?php
declare(strict_types=1);

namespace XerviceTest\ExceptionHandler\TestInjector;


use Xervice\ExceptionHandler\Business\Model\Handler\ExceptionHandlerInterface;

class TestHandler implements ExceptionHandlerInterface
{
    /**
     * @param \Throwable $exception
     * @param bool $isDebug
     */
    public function handleException(\Throwable $exception, bool $isDebug): void
    {
        echo $exception->getMessage();
    }

}