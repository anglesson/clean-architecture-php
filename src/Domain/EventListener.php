<?php

namespace Alura\Architecture\Domain;

abstract class EventListener
{

    public function process(Event $event): void
    {
        if($this->knowProcess($event)) {
            $this->reactTo($event);
        }
    }

    abstract public function knowProcess(Event $event): bool;
    abstract public function reactTo(Event $event): void;
}