<?php

namespace App\Http\Controllers;

class LabController extends Controller
{
    /**
     * Лендинг «ЛАБОРАТОРИЯ НЕКСУС — ОСНОВАНИЕ».
     */
    public function home()
    {
        return view('home');
    }
}
