<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Team;
use App\User;

class TeamController extends Controller
{
    public function index(){
        return response()->json(Team::all());
    }

    public function store(Request $request){

        $this->validate($request, [
            'name'        => 'required|unique:teams',
            'competitions'=> 'required|array|min:1',
            'users'       =>'required|array|min:1'
        ]);

        $team = Team::create([
            'name'      => $request->name,
            'status_id' => 5,
        ]);

        foreach ($request->users as $user) {
            $user_l = User::find($user['id']);
            $user_l->team_id = $team->id;
            $user_l->boss_team = $user['boss'];
            $user_l->save();
        }

        $team->competitions()->attach($request->competitions);

        return response()->json(Team::with(['users','competitions'])->get());
    }
    
}