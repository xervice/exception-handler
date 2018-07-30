<?php
declare(strict_types=1);

namespace Xervice\ExceptionHandler;


use Xervice\Core\Dependency\DependencyProviderInterface;
use Xervice\Core\Dependency\Provider\AbstractProvider;
use Xervice\ExceptionHandler\Business\Handler\HandlerCollection;
use Xervice\ExceptionHandler\Business\Register\RegisterCollection;

class ExceptionHandlerDependencyProvider extends AbstractProvider
{
    public const EXCEPTION_HANDLER = 'exception.handler';

    public const EXCEPTION_REGISTER = 'exception.register';

    public function handleDependencies(DependencyProviderInterface $dependencyProvider): void
    {
        $dependencyProvider[self::EXCEPTION_HANDLER] = function () {
            return new HandlerCollection(
                $this->getExceptionHandler()
            );
        };

        $dependencyProvider[self::EXCEPTION_REGISTER] = function () {
            return new RegisterCollection(
                $this->getExceptionRegister()
            );
        };
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Handler\ExceptionHandlerInterface[]
     */
    public function getExceptionHandler(): array
    {
        return [];
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Register\RegisterInterface[]
     */
    public function getExceptionRegister(): array
    {
        return [];
    }
}
