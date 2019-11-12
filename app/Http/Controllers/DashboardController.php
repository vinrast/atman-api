<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Competition;
use App\Call;
use App\Team;

class DashboardController extends Controller
{
    public function index(){
        return response()->json([   "total_calls"   => Call::count(),
                                    "end_calls"     => Call::where('status_id',3)->count(),
                                    "new_calls"     => 23,
                                    "calls"         => Call::paginate(5),
                                    "teams"         => Team::with('competitions')->paginate(5)

                                ],200);
    }
    
}