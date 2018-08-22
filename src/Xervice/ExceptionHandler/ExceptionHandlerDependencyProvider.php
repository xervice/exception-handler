<?php
declare(strict_types=1);

namespace Xervice\ExceptionHandler;


use Xervice\Core\Business\Model\Dependency\DependencyContainerInterface;
use Xervice\Core\Business\Model\Dependency\Provider\AbstractDependencyProvider;
use Xervice\ExceptionHandler\Business\Model\Handler\HandlerCollection;
use Xervice\ExceptionHandler\Business\Model\Register\RegisterCollection;

class ExceptionHandlerDependencyProvider extends AbstractDependencyProvider
{
    public const EXCEPTION_HANDLER = 'exception.handler';

    public const EXCEPTION_REGISTER = 'exception.register';

    /**
     * @param \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface $container
     *
     * @return \Xervice\Core\Business\Model\Dependency\DependencyContainerInterface
     */
    public function handleDependencies(DependencyContainerInterface $container): DependencyContainerInterface
    {
        $container[self::EXCEPTION_HANDLER] = function () {
            return new HandlerCollection(
                $this->getExceptionHandler()
            );
        };

        $container[self::EXCEPTION_REGISTER] = function () {
            return new RegisterCollection(
                $this->getExceptionRegister()
            );
        };

        return $container;
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Model\Handler\ExceptionHandlerInterface[]
     */
    public function getExceptionHandler(): array
    {
        return [];
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Model\Register\RegisterInterface[]
     */
    public function getExceptionRegister(): array
    {
        return [];
    }
}
