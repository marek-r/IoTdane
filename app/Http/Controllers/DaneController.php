<?php

namespace App\Http\Controllers;

use App\Models\Log;

class DaneController
{
    /**
     * Pobiera wszystkie dane w formacie json,następnie na potrzeby widoku zamienia na tablicę asocjacyjną
     * odwraca (aby nowe dane były na górze).
     * @return \Illuminate\View\View|\Laravel\Lumen\Application
     */
    public function dane()
    {
        $logs = Log::all();
        $logsArray= json_decode($logs,true);
        $logsArray = array_reverse($logsArray);
        $dataCzas = date("Y/m/d H:i:s");
        $urlTabela = env('URL_TABELA');
        return view('dane', compact('logsArray',
            'dataCzas','urlTabela'));
    }

    public function tabela()
    {
        $logs = Log::all();
        $logsArray = json_decode($logs, true);
        $logsArray = array_reverse($logsArray);
        $dataCzas = date("Y/m/d H:i:s");
        return view('tabela', compact('logsArray',
            'dataCzas'));
    }
}
