<?php
declare(strict_types=1);

namespace Xervice\ExceptionHandler;


use Xervice\ExceptionHandler\Business\Handler\DefaultExceptionHandler;
use Xervice\ExceptionHandler\Business\Handler\HandlerCollection;
use Xervice\ExceptionHandler\Business\Handler\HandlerProvider;
use Xervice\ExceptionHandler\Business\Handler\HandlerProviderInterface;
use Xervice\Core\Factory\AbstractFactory;
use Xervice\ExceptionHandler\Business\Register\ExceptionRegistrar;
use Xervice\ExceptionHandler\Business\Register\ExceptionRegistrarInterface;
use Xervice\ExceptionHandler\Business\Register\RegisterCollection;

/**
 * @method \Xervice\ExceptionHandler\ExceptionHandlerConfig getConfig()
 */
class ExceptionHandlerFactory extends AbstractFactory
{
    /**
     * @return \Xervice\ExceptionHandler\Business\Handler\HandlerProvider
     */
    public function createExceptionHandler(): HandlerProviderInterface
    {
        return new HandlerProvider(
            $this->getExceptionHandlerCollection(),
            $this->getConfig()->isDebug()
        );
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Register\ExceptionRegistrarInterface
     */
    public function createExceptionRegistrar(): ExceptionRegistrarInterface
    {
        return new ExceptionRegistrar(
            $this->getExceptionRegisterCollection(),
            $this->getConfig()->isDebug()
        );
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Handler\HandlerCollection
     */
    public function getExceptionHandlerCollection(): HandlerCollection
    {
        return $this->getDependency(ExceptionHandlerDependencyProvider::EXCEPTION_HANDLER);
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Register\RegisterCollection
     */
    public function getExceptionRegisterCollection(): RegisterCollection
    {
        return $this->getDependency(ExceptionHandlerDependencyProvider::EXCEPTION_REGISTER);
    }
}