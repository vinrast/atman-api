<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Call;
use App\Team;
use Carbon\Carbon;

class CallController extends Controller
{
    public function index(){
        return response()->json(["data"=>Call::with('competitions')->get()],200);
    }

    public function store(Request $request){

        $this->validate($request, [
            'name'          => 'required',
            'team_id'       => 'required|integer',
            'deadline'      => 'required|integer',
            'position'      => 'required',
            'address'       => 'required',
            'description'   => 'required|max:200',
            'competitions'  => 'required|array|min:1',
            'proposed_end'  => 'required|date'
        ]);

        $team = Call::create([
            'name'        => $request->name,
            'team_id'     => $request->team_id,
            'deadline'    => $request->deadline,
            'position'    => $request->position,
            'address'     => $request->address,
            'description' => $request->description,
            'proposed_end'=> $request->proposed_end,
            'status_id'   => 1
        ]);

        $team->competitions()->attach($request->competitions);

        return response()->json(Call::with(['competitions'])->get());
    }

    public function showTechnical(Request $request){

        $team = $request->team_id;
        $calls = Call::where('team_id',$team)->get();
        return response()->json(Call::with(['competitions'])->get());
    }

    public function changeState(Request $request){

        $query = Call::where('team_id',$request->team_id)->where('status_id',2)->first();
        if(empty($query)){
            $call = Call::find($request->id);
            $call->status_id = 2;
            $call->save();
        }

        return response()->json(Call::with(['competitions'])->get());
    }

    public function close(Request $request){

            $call = Call::find($request->id);
            $call->status_id  = 3;
            $call->final_date = Carbon::now();
            $call->save();
        
        return response()->json(Call::with(['competitions'])->get());
    }
    
}