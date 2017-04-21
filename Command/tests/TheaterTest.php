<?php

use Command\StopActor;
use Command\{Actor, Theater, SleepActor};

class TheaterTest extends PHPUnit\Framework\TestCase
{
    /** @test */
    public function a_theater_can_add_actor()
    {
        $theater = new Theater;
        $theater->addActor(new Actor('name', 5));

        $this->assertSame(1, $theater->remainActors());
    }

    /** @test */
    public function a_theater_can_remove_actor()
    {
        $theater = new Theater;
        $theater->addActor(new Actor('name1', 5));
        $theater->addActor(new Actor('name2', 5));

        $theater->removeActor(0);

        $this->assertSame(1, $theater->remainActors());
        $this->assertSame('name2', $theater->getActor()->getName());
    }

    /** @test */
    public function a_theater_can_run_with_a_sleep_actor()
    {
        $theater = new Theater;
        $theater->addActor(new SleepActor('sleep', 3, $theater, new StopActor));
        $time = time();
        $theater->run();
        $time = time() - $time;

        $this->assertTrue($time >= 3);
    }
}