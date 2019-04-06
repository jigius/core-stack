<?php
namespace Core\Stack;

interface CollectionInterface
{
    public function pull(string $name, StackInterface $stack = null): StackInterface;

    public function push(string $name, StackInterface $stack): CollectionInterface;

    public function has(string $name): bool;

    public function iterator(): iterable;

    public function count(): int;
}
