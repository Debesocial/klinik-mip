<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormTindakan extends Component
{


    public $tindakan;
    public $alatkesehatan;
    public $selectedTindakan;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($tindakan, $alatkesehatan, $selectedTindakan)
    {
        $this->tindakan = $tindakan;
        $this->alatkesehatan = $alatkesehatan;
        $this->selectedTindakan = $this->setSelectedTindakan($selectedTindakan);
    }

    public function setSelectedTindakan($tindakan)
    {
        if ($tindakan == null) {
            return json_encode([]);
        }
        return $tindakan;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-tindakan');
    }
}
