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
        $cliente = $this->radioService->getCliente($id);
        return view('radio.listRadioCliente', compact('radios','cliente'));
    }

    public function formCreateCliente()
    {
        return view('cliente.form');
    }

    public function createCliente(Request $request)
    {
        $formParams = [
            'nombre' => $request->nombre,
            'ejecutivo' => $request->ejecutivo,
            'modalidad' => $request->modalidad
        ];
        // dd($formParams);
        $this->radioService->createCliente($formParams);
        return view('cliente.form');
    }

    public function clienteslist()
    {
        $clientes = $this->radioService->getClientes();
        return view('cliente.listClientes', compact('clientes'));
    }

    public function editForm($id)
    {
        $cliente = $this->radioService->getCliente($id);
        return view('cliente.edit', compact('cliente'));
    }

    public function edit(Request $request, $id)
    {
        $formParams = [
            'nombre' => $request->nombre,
            'ejecutivo' => $request->ejecutivo,
            'modalidad' => $request->modalidad
        ];
        $cliente = $this->radioService->editCliente($formParams, $id);
        return view('cliente.show', compact('cliente'));
    }
}
