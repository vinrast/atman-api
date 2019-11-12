<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Competition;

class CompetitionController extends Controller
{
    public function index(){
        return response()->json(["data"=>Competition::all()],200);
    }

    public function store(Request $request){

        $this->validate($request, [
            'name'  => 'required|unique:competitions',
        ]);
        
        $competition = Competition::create([
            'name'  => $request->name
        ]);

        return response()->json(["data"=>$competition],200);
    }
    
}