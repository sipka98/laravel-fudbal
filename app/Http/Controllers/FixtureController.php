<?php

namespace App\Http\Controllers;


use App\Http\Resources\FixtureResource as Resource;
use App\Models\Fixture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FixtureController extends ResponseController
{
    public function index()
    {
        $podaci = Fixture::all();
        return $this->sendSuccessResponse(Resource::collection($podaci), 'Fixtures data!');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'home' => 'required',
            'away' => 'required',
            'matchPlayed' => 'required',
            'score' => 'required',
        ]);
        if($validator->fails()){
            return $this->sendErrorResponse($validator->errors());
        }

        $objekat = Fixture::create($input);

        return $this->sendSuccessResponse(new Resource($objekat), 'Fixture added.');
    }


    public function show($id)
    {
        $objekat = Fixture::find($id);
        if (is_null($objekat)) {
            return $this->sendErrorResponse('No object with that Id.');
        }
        return $this->sendSuccessResponse(new Resource($objekat), 'Fixture with id returned.');
    }


    public function update(Request $request, $id)
    {
       $objekat = Fixture::find($id);
        if (is_null($objekat)) {
            return $this->sendErrorResponse('No object with that Id.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'id'=> 'required',
            'home' => 'required',
            'away' => 'required',
            'matchPlayed' => 'required',
            'score' => 'required',
        ]);


        if($validator->fails()){
            return $this->sendErrorResponse($validator->errors());
        }

        $objekat->home = $input['home'];
        $objekat->away = $input['away'];
        $objekat->matchPlayed = $input['matchPlayed'];
        $objekat->score = $input['score'];
        $objekat->save();

        return $this->sendSuccessResponse(new Resource($objekat), 'Object updated.');
    }

    public function destroy($id)
    {
        $objekat = Fixture::find($id);
        if (is_null($objekat)) {
            return $this->sendErrorResponse('No object with that Id.');
        }

        $objekat->delete();
        return $this->sendSuccessResponse([], 'Deleted.');
    }
}
