<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function showCliente($id)
    {
        $cliente = $this->radioService->getCliente($id);
        return view('cliente.show', compact('cliente'));
    }

    public function showRadiosCliente($id)
    {
        $radios = $this->radioService->getClienteRadios($id);
        return view('radio.listRadioCliente', compact('radios'));
    }
}
