<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Consultant;

class ConsultantMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
{
    // Check if the request has a consultant_id and if it exists in the database
    if ($request->has('consultant_id')) {
        $consultant = Consultant::find($request->get('consultant_id'));
        if (!$consultant) {
            // If the consultant does not exist, return a 404 response
            return response()->json(['message' => 'Consultant not found'], 404);
        }
    } else {
        // If the request does not have a consultant_id, return a 400 response
        return response()->json(['message' => 'Missing consultant_id'], 400);
    }

    // If the consultant exists, proceed with the request
    return $next($request);
}
}
