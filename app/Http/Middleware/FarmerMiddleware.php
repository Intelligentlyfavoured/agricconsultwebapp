<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Farmer;

class FarmerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the request has a farmer_id and if it exists in the database
        if ($request->has('farmer_id')) {
            $farmer = Farmer::find($request->get('farmer_id'));
            if (!$farmer) {
                // If the farmer does not exist, return a 404 response
                return response()->json(['message' => 'Farmer not found'], 404);
            }
        } else {
            // If the request does not have a farmer_id, return a 400 response
            return response()->json(['message' => 'Missing farmer_id'], 400);
        }

        // If the farmer exists, proceed with the request
        return $next($request);
    }
}
