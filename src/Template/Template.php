<?php

namespace ColdBolt\Template;

class Template
{
    private string $template;
    private string $path;

    public function __construct(string $path = "templates")
    {
        $this->path = __DIR__ . '/../../' .$path;
    }

    public function setTemplate(string $template): self {
        $this->template = $template;
        return $this;
    }

    public function render(?array $params = null): string
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
