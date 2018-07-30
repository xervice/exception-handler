<?php


namespace Xervice\ExceptionHandler\Business\Register\Register;


use Xervice\Core\Locator\AbstractWithLocator;
use Xervice\ExceptionHandler\Business\Register\RegisterInterface;

/**
 * @method \Xervice\ExceptionHandler\ExceptionHandlerFacade getFacade()
 */
class ExceptionHandlerRegister extends AbstractWithLocator implements RegisterInterface
{
    /**
     * @param bool $isDebug
     *
     * @throws \Core\Locator\Dynamic\ServiceNotParseable
     */
    public function register(bool $isDebug): void
    {
        set_exception_handler(
            [
                $this->getFacade(),
                'handleException'
            ]
        );
    }
}