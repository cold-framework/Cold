<?php

namespace ColdBolt\Template;

class Template
{
    private string $template;
    private string $path;

    public function __construct(string $template, string $path = "templates")
    {
        $this->template = $template;
        $this->path = __DIR__ . '/../../' .$path;
    }

    public function render(?array $params): string
    {
        if (null !== $params) {
            extract($params);
        }

        ob_start();
        include($this->path . '/' . $this->template . '.html');
        $content = ob_get_contents();
        ob_end_clean();
        return $content;
    }
}
