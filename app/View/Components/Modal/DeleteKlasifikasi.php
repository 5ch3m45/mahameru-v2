<?php

namespace App\View\Components\Modal;

use Illuminate\View\Component;

class DeleteKlasifikasi extends Component
{
    public $klasifikasiID;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($klasifikasiID)
    {
        $this->klasifikasiID = $klasifikasiID;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal.delete-klasifikasi');
    }
}
