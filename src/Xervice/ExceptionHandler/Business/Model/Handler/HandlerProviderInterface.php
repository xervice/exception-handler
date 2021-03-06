<?php
declare(strict_types=1);

namespace Xervice\ExceptionHandler\Business\Model\Handler;

interface HandlerProviderInterface
{
    /**
     * @param \Exception $exception
     */
    public function handleException(\Throwable $exception): void;
}