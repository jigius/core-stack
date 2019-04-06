<?php
namespace Core\Stack;

final class Plain implements StackInterface
{
    private $chunk;

    public function __construct()
    {
        $this->chunk = [];
    }

    public function push($payload): StackInterface
    {
        array_push($this->chunk, $payload);
        return $this;
    }

    public function pop()
    {
        return array_pop($this->chunk);
    }

    public function output(string $delim = ""): string
    {
        return implode($delim, $this->chunk);
    }

    public function created(): StackInterface
    {
        return new self();
    }
}
