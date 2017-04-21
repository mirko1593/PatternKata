<?php 

namespace Command;

class SleepActor extends Actor
{
    protected $theater;
    protected $stopActor;

    protected $startActing;
    protected $startTime = 0;

    public function __construct($name, $time, $theater, $stopActor)
    {
        parent::__construct($name, $time);
        $this->theater = $theater;
        $this->stopActor = $stopActor;
        $this->startActing = false;
    }

    public function execute()
    {
        $currentTime = time();

        if (! $this->startActing) {
            $this->startActing = true;
            $this->startTime = $currentTime;
            $this->theater->addActor($this);
        } else if (($currentTime - $this->startTime) < $this->time) {
            $this->theater->addActor($this);
        } else {
            $this->theater->addActor($this->stopActor);
        }
    }
}