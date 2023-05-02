<?php

namespace App\View\Components\Modal;

use Illuminate\View\Component;

class UploadLampiran extends Component
{
    public $arsipID;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($arsipID)
    {
        $this->arsipID = $arsipID;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.modal.upload-lampiran');
    }
}
