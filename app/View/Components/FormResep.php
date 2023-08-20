<?php

namespace App\View\Components;

use App\Models\AturanPakai;
use App\Models\Dosis;
use Illuminate\View\Component;

class FormResep extends Component
{

    public $obat;
    public $satuanobat;
    public $aturan;
    public $dosis;
    public $resep;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($obat, $satuanobat, $resep)
    {
        $this->obat = $obat;
        $this->satuanobat = $satuanobat;
        $this->aturan = AturanPakai::get();
        $this->dosis = Dosis::get();
        $this->resep = $this->setSelectedResep($resep);
    }

    public function setSelectedResep($resep)
    {
        if ($resep == null) {
            return json_encode([]);
        }
        return $resep;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.form-resep');
    }
}
