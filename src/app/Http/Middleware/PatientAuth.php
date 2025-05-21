<?php

namespace App\Http\Middleware;

use App\Models\Patient;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PatientAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        $patient = Patient::where('token', $token)->first();
        if (!$patient){
            return response()->json([
                'message' => 'Unathorized'
            ], 401);
        }
        $request->merge(['authenticated_patient' => $patient]);
        return $next($request);
    }
}
