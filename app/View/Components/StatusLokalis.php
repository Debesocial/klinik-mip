<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusLokalis extends Component
{
    public $titik;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titik = null)
    {
        $this->titik = $titik ?? json_encode([]);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.status-lokalis');
    }
}
