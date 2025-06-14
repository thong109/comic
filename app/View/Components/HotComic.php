<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class HotComic extends Component
{
    public $data;
    public $title;
    /**
     * Create a new component instance.
     */
    public function __construct($data, $title)
    {
        //
        $this->data = $data;
        $this->title = $title;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.hot-comic', [
            'data' => $this->data,
            'title' => $this->title,
        ]);
    }
}
