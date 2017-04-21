<?php 

use Command\Actor;
use Command\Command;

class ActorTest extends PHPUnit\Framework\TestCase
{
    /** @test */
    public function actor_can_execute_for_certain_time()
    {
        $actor = new Actor('name', 5);

        $this->assertTrue($actor instanceof Command);
    }    
}