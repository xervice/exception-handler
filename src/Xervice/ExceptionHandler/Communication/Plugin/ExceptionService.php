<?php


namespace Xervice\ExceptionHandler\Communication\Plugin;


use Xervice\Core\Plugin\AbstractCommunicationPlugin;
use Xervice\Kernel\Business\Model\Service\ServiceProviderInterface;
use Xervice\Kernel\Business\Plugin\BootInterface;

/**
 * @method \Xervice\ExceptionHandler\Business\ExceptionHandlerFacade getFacade()
 */
class ExceptionService extends AbstractCommunicationPlugin implements BootInterface
{
    /**
     * @param \Xervice\Kernel\Business\Model\Service\ServiceProviderInterface $serviceProvider
     */
    public function boot(ServiceProviderInterface $serviceProvider): void
    {
        $this->getFacade()->registerExceptionHandler();
    }
}