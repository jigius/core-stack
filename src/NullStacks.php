<?php
namespace Core\Stack;

final class NullStacks implements CollectionInterface
{
    public function __construct(StackInterface $stack = null)
    {
        $this->blueprint = $stack;
    }

    public function pull(string $name, StackInterface $stack = null): StackInterface
    {
        return ($this->blueprint())->created();
    }

    public function push(string $name, StackInterface $stack): CollectionInterface
    {
        return $this;
    }

    public function has(string $name): bool
    {
        return false;
    }

    public function iterator(): iterable
    {
        return new \ArrayIterator([]);
    }

    public function count(): int
    {
        return 0;
    }

    private function blueprint()
    {
        return $this->blueprint === null? new Plain(): $this->blueprint;
    }
}
