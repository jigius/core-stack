<?php
namespace Core\Stack;

final class PrependedIfNotEmptyWith implements StackInterface
{
    private $orig;

    private $str;

    public function __construct(StackInterface $stack, string $str)
    {
        $this->orig = $stack;
        $this->str = $str;
    }

    public function push($payload): StackInterface
    {
        return $this->orig->push($payload);
    }

    public function pop()
    {
        return $this->orig->pop();
    }

    public function output(string $delim = ""): string
    {
        return !!($output = $this->orig->output($delim))? $this->str . $output: "";
    }

    public function created(): StackInterface
    {
        return new self(
            $this->orig->created(),
            $this->str
        );
    }
}
