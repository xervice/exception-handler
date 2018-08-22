<?php
declare(strict_types=1);


namespace Xervice\ExceptionHandler\Business\Model\Handler;


interface ExceptionHandlerInterface
{
    /**
     * @param \Exception $exception
     * @param bool $isDebug
     */
    public function handleException(\Throwable $exception, bool $isDebug): void;
}