<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateVisitRequest;
use App\Models\Visit;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class VisitController extends Controller
{
    public function getVisits() {
        $visitsByLocation = Visit::select([
            'location',
            DB::raw("COUNT(*) as count")
        ])
        ->groupBy('location')
        ->get()
        ->values();

        $visitsByTime = Visit::select([
            DB::raw("strftime('%Y-%m-%d %H:00', created_at) as time"),
            DB::raw("COUNT(*) as count")
        ])
        ->groupBy('time')
        ->limit(10)
        ->get()
        ->values();  

        return response()->json([
        'visits_by_time' => $visitsByTime,
        'visits_by_location' => $visitsByLocation,
    ]);
    }

    public function saveVisit(CreateVisitRequest $request) {
        $data = $request->validated();

        Visit::whereBetween('created_at', [Carbon::now()->startOfHour(), Carbon::now()->endOfHour()])->firstOrCreate(
            [
                'ip_address' => $data['ip_address'],
            ],
            [
                'location' => $data['location'],
                'device' => $data['device'],
            ]
        );
    }
}
