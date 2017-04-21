<?php 

namespace Command;

class Theater
{
    protected $actors = [];

    public static $stopActing = false;

    public function addActor($actor)
    {
        $this->actors[] = $actor;
    }

    public function remainActors()
    {
        return sizeof($this->actors);
    }

    public function removeActor()
    {
        array_shift($this->actors);
    }

    public function getActor()
    {
        return $this->actors[0];
    }

    public function run()
    {
        while (!self::$stopActing && $this->actors != []) {
            $actor = $this->getActor();
            $this->removeActor();
            $actor->execute();
        }
    }
}