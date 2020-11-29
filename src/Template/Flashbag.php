<?php

namespace ColdBolt\Template;

class Flashbag implements \Iterator {
    private int $position = 0;
    private array $flash = [];

    public function addFlash(string $message) {
        $this->flash[] = $message;
    }

    public function format(): string {
        $content = "";
        foreach ($this->flash as $flash) {
		    $content .=  <<<ERRORMESSAGE
<h2 class="text-xl text-regular my-16">
    <svg width="1em" height="1em" viewBox="0 0 16 16" fill="rgb(220, 38, 38)" xmlns="http://www.w3.org/2000/svg">
    <path fill-rule="evenodd" d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm6 4a.905.905 0 0 0-.9.995l.35 3.507a.552.552 0 0 0 1.1 0l.35-3.507A.905.905 0 0 0 8 4zm.002 6a1 1 0 1 0 0 2 1 1 0 0 0 0-2z"/>
    </svg>
    $flash
</h2>
ERRORMESSAGE;
		}
        
        return $content .= '<hr class="w-3/4 my-16">';
    }

    public function current(): string
    {
        return $this->flash[$this->position];
    }
    public function key()
    {
        return $this->position;
    }
    public function next(): void 
    {
        ++$this->position;
    }
    public function rewind(): void 
    {
        $this->position;
    }
    public function valid(): bool 
    {
        return isset($this->flash[$this->position]);
    }
}