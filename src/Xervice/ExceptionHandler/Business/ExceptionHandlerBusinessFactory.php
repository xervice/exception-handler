<?php
declare(strict_types=1);

namespace Xervice\ExceptionHandler\Business;


use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;
use Xervice\ExceptionHandler\Business\Model\Handler\HandlerCollection;
use Xervice\ExceptionHandler\Business\Model\Handler\HandlerProvider;
use Xervice\ExceptionHandler\Business\Model\Handler\HandlerProviderInterface;
use Xervice\ExceptionHandler\Business\Model\Register\ExceptionRegistrar;
use Xervice\ExceptionHandler\Business\Model\Register\ExceptionRegistrarInterface;
use Xervice\ExceptionHandler\Business\Model\Register\RegisterCollection;
use Xervice\ExceptionHandler\ExceptionHandlerDependencyProvider;

/**
 * @method \Xervice\ExceptionHandler\ExceptionHandlerConfig getConfig()
 */
class ExceptionHandlerBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Xervice\ExceptionHandler\Business\Model\Handler\HandlerProviderInterface
     */
    public function createExceptionHandler(): HandlerProviderInterface
    {
        return new HandlerProvider(
            $this->getExceptionHandlerCollection(),
            $this->getConfig()->isDebug()
        );
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Model\Register\ExceptionRegistrarInterface
     */
    public function createExceptionRegistrar(): ExceptionRegistrarInterface
    {
        return new ExceptionRegistrar(
            $this->getExceptionRegisterCollection(),
            $this->getConfig()->isDebug()
        );
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Model\Handler\HandlerCollection
     */
    public function getExceptionHandlerCollection(): HandlerCollection
    {
        return $this->getDependency(ExceptionHandlerDependencyProvider::EXCEPTION_HANDLER);
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Model\Register\RegisterCollection
     */
    public function getExceptionRegisterCollection(): RegisterCollection
    {
        return $this->getDependency(ExceptionHandlerDependencyProvider::EXCEPTION_REGISTER);
    }
}