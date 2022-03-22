<?php

namespace App\Http\Middleware;

use Closure;

class ApiAutoryzacjaBasicMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         * Autoryzacja typu basic
         * Przykład nagłówka:
         * Authorization: Basic dXNlcm5hbWU6cGFzc3dvcmQ=
         * username:password
         * ! Ten middleware działa dla wszystkich routingów, po dodaniu go do konkretnego routingu pojawia się 500 server internal
         * ! error- być może dlatego, że stoi na windows.
         */

        if ($request->method() == "POST") {
            if (!$request->header('Authorization')) { // Sprawdza czy istnieje nazwa Authorization w nagłówku zapytania
                return response()->json('Brak nagłówka autoryzującego.', 401);
            } else {
                $authorization = $request->header('Authorization'); // Oparte na autoryzacji typu Basic, czyli nagłówek musi zawierać klucz Authorization z wartością Basic user:pass (zakodowane w base64)
                $authorization = explode(' ', $authorization); // Umieszcza dane w tablicy
                $authorization = base64_decode($authorization[1]); // Rozkodowuje dane autoryzacujne
                $authorization = explode(':', $authorization); //Umieszcza dane autoryzacyjne w tablicy
//           dd($authorization);
                if ($authorization[0] != env('UZYTKOWNIK') || $authorization[1] != env('KLUCZ_API')) {
                    return response()->json('Brak autoryzacji.', 401);
                } else {
                    return $next($request);
                }
            }
        } else{
            return $next($request);
        }
    }
}
