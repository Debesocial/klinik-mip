<?php

namespace App\View\Components;

use Illuminate\View\Component;

class StatusLokalis extends Component
{
    public $titik;
    public $form;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($titik = null, $form=true)
    {
        $this->titik = $titik ?? json_encode([]);
        $this->form = $form;
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
