<?php

namespace App\Http\Controllers;


use App\Http\Resources\TeamResource as Resource;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends ResponseController
{
    public function index()
    {
        $podaci = Team::all();
        return $this->sendSuccessResponse(Resource::collection($podaci), 'Teams data!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'name' => 'required',
            'country' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'years' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendErrorResponse($validator->errors());
        }

        $objekat = Team::create($input);

        return $this->sendSuccessResponse(new Resource($objekat), 'Team added.');
    }


    public function show($id)
    {
        $objekat = Team::find($id);
        if (is_null($objekat)) {
            return $this->sendErrorResponse('No object with that Id.');
        }
        return $this->sendSuccessResponse(new Resource($objekat), 'Team with id returned.');
    }


    public function update(Request $request, $id)
    {
        $objekat = Team::find($id);
        if (is_null($objekat)) {
            return $this->sendErrorResponse('No object with that Id.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'country' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'address' => 'required',
        ]);

        if($validator->fails()){
            return $this->sendErrorResponse($validator->errors());
        }

        $objekat->name = $input['name'];
        $objekat->country = $input['country'];
        $objekat->email = $input['email'];
        $objekat->phone = $input['phone'];
        $objekat->address = $input['address'];
        $objekat->save();

        return $this->sendSuccessResponse(new Resource($objekat), 'Object updated.');
    }

    public function destroy($id)
    {
        $objekat = Team::find($id);
        if (is_null($objekat)) {
            return $this->sendErrorResponse('No object with that Id.');
        }

        $objekat->delete();
        return $this->sendSuccessResponse([], 'Deleted.');
    }
}
