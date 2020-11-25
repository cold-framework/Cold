<?php

namespace ColdBolt;

class Template
{
    private string $template;
    private string $path;

    public function __construct(string $template, string $path = "templates")
    {
        $this->template = $template;
        $this->path = __DIR__ . '/../' .$path;
    }

    public function render()
    {
        $content = file_get_contents($this->path . '/' . $this->template . '.html');
        ob_start();
        echo $content;
        $out = ob_get_contents();
        ob_end_clean();
        echo $out;
    }
}
