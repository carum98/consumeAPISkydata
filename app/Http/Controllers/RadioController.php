<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RadioController extends Controller
{
    public function showRadio($id)
    {
        $radio = $this->radioService->getRadio($id);
        return view('radio.show', compact('radio'));
    }
}
