<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Log;
use PHPUnit\TextUI\Exception;

/*
 * Kontroler odpowiedzialny za operacje na wpisach do bazy danych.
 */
class LogsController
{
    /**
     * Pobiera wszystkie dane.
     * GET /logs
     */
    public function index()
    {
        try {
            return Log::select('*')->orderByDesc('id')->get();
        } catch (\Exception $error)
        {
            return response()->json(['Błąd podczas pobierania danych'=>$error->getMessage()],400);
        }
    }

    /**
     * Dodaje nowy wpis.
     * POST /logs
     * @param Request $request
     */
    public function create(Request $request)
    {
        try {
            Log::create($request->all());
            return response()->json(['dodano' => true], 201);
        } catch (Exception $error)
        {
            return response()->json(['Błąd podczas dodawania danych'=>$error->getMessage()],400);
        }
    }
}
