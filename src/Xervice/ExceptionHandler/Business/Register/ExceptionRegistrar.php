<?php


namespace Xervice\ExceptionHandler\Business\Register;


class ExceptionRegistrar implements ExceptionRegistrarInterface
{
    /**
     * @var \Xervice\ExceptionHandler\Business\Register\RegisterCollection
     */
    private $register;

    /**
     * @var bool
     */
    private $isDebug;

    /**
     * ExceptionRegistrar constructor.
     *
     * @param \Xervice\ExceptionHandler\Business\Register\RegisterCollection $register
     * @param bool $isDebug
     */
    public function __construct(RegisterCollection $register, bool $isDebug)
    {
        $this->register = $register;
        $this->isDebug = $isDebug;
    }

    public function register(): void
    {
        foreach ($this->register as $register) {
            $register->register($this->isDebug);
        }
    }
}