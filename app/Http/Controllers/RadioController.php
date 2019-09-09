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

    public function formCreateRadio()
    {
        $clientes = $this->radioService->getClientes();
        return view('radio.form', compact('clientes'));
    }

    public function createRadio(Request $request)
    {
        $formParams = [
            'nombre' => $request->nombre,
            'imei' => $request->imei,
            'modelo' => $request->modelo,
            'status' => $request->status,
            'cliente_id' => $request->cliente_id
        ];
        $this->radioService->createRadio($formParams);
        return redirect()->back();
    }
}
