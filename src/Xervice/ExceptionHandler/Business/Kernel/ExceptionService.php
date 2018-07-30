<?php


namespace Xervice\ExceptionHandler\Business\Kernel;


use Xervice\Core\Locator\AbstractWithLocator;
use Xervice\Kernel\Business\Service\BootInterface;
use Xervice\Kernel\Business\Service\ServiceProviderInterface;

/**
 * @method \Xervice\ExceptionHandler\ExceptionHandlerFacade getFacade()
 */
class ExceptionService extends AbstractWithLocator implements BootInterface
{
    /**
     * @param \Xervice\Kernel\Business\Service\ServiceProviderInterface $serviceProvider
     *
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    public function boot(ServiceProviderInterface $serviceProvider): void
    {
        $this->getFacade()->registerExceptionHandler();
    }
}