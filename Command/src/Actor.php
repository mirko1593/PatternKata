<?php 

namespace Command;

class Actor implements Command
{
    protected $name;

    protected $time;

    public function __construct($name, $time)
    {
        $this->name = $name;
        $this->time = $time;
    }

    public function getName()
    {
        return $this->name;
    }

    public function execute()
    {
        
    }
}