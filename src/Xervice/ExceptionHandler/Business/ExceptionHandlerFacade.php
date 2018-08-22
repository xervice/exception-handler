<?php
declare(strict_types=1);


namespace Xervice\ExceptionHandler\Business;

use Xervice\Core\Business\Model\Facade\AbstractFacade;

/**
 * @method \Xervice\ExceptionHandler\Business\ExceptionHandlerBusinessFactory getFactory()
 * @method \Xervice\ExceptionHandler\ExceptionHandlerConfig getConfig()
 */
class ExceptionHandlerFacade extends AbstractFacade
{
    /**
     * @param \Exception $exception
     */
    public function handleException(\Throwable $exception): void
    {
        $this->getFactory()->createExceptionHandler()->handleException($exception);
    }

    public function registerExceptionHandler(): void
    {
        $this->getFactory()->createExceptionRegistrar()->register();
    }
}