<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function showWelcomePage()
    {
        $radios = $this->radioService->getRadios();
        $clientes = $this->radioService->getClientes();
        return view('welcome', compact('radios', 'clientes'));
    }
}
