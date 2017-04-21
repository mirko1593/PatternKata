<?php 

namespace Command;

class StopActor implements Command
{
    public function execute()
    {
        Theater::$stopActing = true;    
    }
}