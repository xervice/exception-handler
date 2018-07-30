<?php


namespace Xervice\ExceptionHandler\Business\Register;


class RegisterCollection implements \Iterator, \Countable
{
    /**
     * @var \Xervice\ExceptionHandler\Business\Register\RegisterInterface[]
     */
    private $collection;

    /**
     * @var int
     */
    private $position;

    /**
     * Collection constructor.
     *
     * @param \Xervice\ExceptionHandler\Business\Register\RegisterInterface[] $collection
     */
    public function __construct(array $collection)
    {
        foreach ($collection as $validator) {
            $this->add($validator);
        }
    }

    /**
     * @param \Xervice\ExceptionHandler\Business\Register\RegisterInterface $validator
     */
    public function add(RegisterInterface $validator): void
    {
        $this->collection[] = $validator;
    }

    /**
     * @return \Xervice\ExceptionHandler\Business\Register\RegisterInterface
     */
    public function current(): RegisterInterface
    {
        return $this->collection[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->collection[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return \count($this->collection);
    }
}