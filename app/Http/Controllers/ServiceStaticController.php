<?php

namespace App\Http\Controllers;

class ServiceStaticController extends Controller
{
    public function terapiaPsicologica()
    {
        return view('services.static.terapia-psicologica');
    }

    public function capsulasSaludMental()
    {
        return view('services.static.capsulas-salud-mental');
    }

    public function espaciosGrupales()
    {
        return view('services.static.espacios-grupales');
    }
}

