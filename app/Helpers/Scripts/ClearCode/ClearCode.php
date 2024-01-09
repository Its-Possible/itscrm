<?php

namespace App\Helpers\Scripts\ClearCode;

class ClearCode {

    private array $data;
    private array $variables;
    private string $content;

    public function __construct()
    {
        $this->load();
    }

    private function load(): void
    {
        require_once(__DIR__ . '/inc/functions.php');
        $this->variables = require_once(__DIR__ . '/inc/variables.php');
    }

    public function content(string $content, array $data = []): static
    {
        $this->data = $data;
        $this->content = $content;
        return $this;
    }

    public function render(): string
    {
        foreach($this->variables as $variable => $method)
        {
            if(count($this->data) > 0) {
                $this->content = str_replace($variable, call_user_func($method, $this->data), $this->content);
            }else {
                $this->content = str_replace($variable, call_user_func($method, $this->data), $this->content);
            }
        }

        return $this->content;
    }

}
