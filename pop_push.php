<?php
declare(strict_types=1);
class Stack {
    private array $stack;
    private int $size;

    public function __construct($size) {
        $this->stack = array();
        $this->size = $size;
    }
    public function getSize() : int {
        return $this->size;
    }
    public function isEmpty() : bool {
        return empty($this->stack);
    }
    public function isFull() : bool {
        return count($this->stack) === $this->getSize();
    }
    public function pop() : void {
        if($this->isEmpty()) {
            echo "The stack is empty. Can not pop values.\n";
        }
        else {
            $lastIndex = count($this->stack) -1;
            $lastElement = $this->stack[$lastIndex];
            unset($this->stack[$lastIndex]);
            echo "Popped value: ", $lastElement, "\n";
        }
    }
    public function push($variable) {
        if(!$this->isFull()) {
            return $this->stack[] = $variable;
        }
        else {
            echo "This stack is full. Can not push more values.", "\n";
            return 0;
        }
    }
    public function printStack() : void {
        if (!$this->isEmpty()) {
            echo "Stack contents: ";
            foreach ($this->stack as $item) {
                echo "$item ";
            }
            echo "\n";
        } else {
            echo "This stack is empty.", " ";
        }
    }
}

$stack1 = new Stack(4);

while (true) {

    echo "Chose action:\n";
    echo "1. Push\n";
    echo "2. Pop\n";
    echo "3. Print\n";

    $option = trim(fgets(STDIN));

    switch ($option) {
        case "1":
            echo "Select integer value: ";
            $value = trim(fgets(STDIN));
            $stack1->push($value);
            break;
        case "2":
            $stack1->pop();
            break;
        case "3":
            $stack1->printStack();
            break;
        default:
            echo "Invalid option.\n";
    }
}