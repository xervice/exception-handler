<?php


namespace Xervice\ExceptionHandler\Business\Model\Register\Register;


use Xervice\Core\Plugin\AbstractBusinessPlugin;
use Xervice\ExceptionHandler\Business\Model\Register\RegisterInterface;

/**
 * @method \Xervice\ExceptionHandler\ExceptionHandlerFacade getFacade()
 */
class ExceptionHandlerRegister extends AbstractBusinessPlugin implements RegisterInterface
{
    /**
     * @param bool $isDebug
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