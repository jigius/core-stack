<?php
namespace Core\Stack;

final class Stacks implements CollectionInterface
{
    private $item;

    public function __construct(StackInterface $stack = null)
    {
        $this->blueprint = $stack;
        $this->item = [];
    }

    public function pull(string $name, StackInterface $stack = null): StackInterface
    {
        if (!$this->has($name)) {
            $this->item[$name] = ($this->blueprint())->created();
        }
        return $this->item[$name];
    }

    public function push(string $name, StackInterface $stack): CollectionInterface
    {
        $this->item[$name] = $stack;
        return $this;
    }

    public function has(string $name): bool
    {
        return isset($this->item[$name]);
    }

    public function iterator(): iterable
    {
        return new \ArrayIterator($this->item);
    }

    public function count(): int
    {
        return count($this->item);
    }

    private function blueprint()
    {
        return $this->blueprint === null? new Plain(): $this->blueprint;
    }
}
