<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;

class PersonController extends Controller
{
    //
    public function index() {
        $allPerson = Person::all();
        $data = array("message" => 'Data retrieved successfully', "data" => $allPerson, "success" => true);
        return response($data, 200);
    }

    public function create(Request $request) {
        $validator = Validator::make($request->all(), [
            'first_name' => 'required',
            'last_name' => 'required',
        ]);
        if ($validator->fails()) {
            return response(array( "message" => $validator->errors()->all(), "success" => false), Response::HTTP_BAD_REQUEST );
        }

        $result = Person::create([
                'first_name' => $request->input('first_name'),
                'last_name' => $request->input('last_name')
            ]
        );

        return response(array("data" => $result, "success" => true, "message" => "Data successfully added"), Response::HTTP_OK);
    }

    public function update(Person $person) {
        request()->validate([
            'first_name' => 'required',
            'last_name' => 'required'
        ]);

        $result = $person->update([
            'first_name' => request('first_name'),
            'last_name' => request('last_name'),
        ]);

        return response(array("data" => $person, "success" => true, "message" => "Data successfully updated"), Response::HTTP_OK);
    }

    public function remove(Person $person) {

        $result = $person->delete();
        
        return response(array("data" => $result, "success" => true, "message" => "Data successfully deleted"), Response::HTTP_OK);
    }
}
