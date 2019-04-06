<?php
namespace Core\Stack;

interface StackInterface
{
    public function push($payload): StackInterface;

    public function pop();

    public function output(string $delim = ""): string;

    public function created(): StackInterface;
}
