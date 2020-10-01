<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repositories\UserRepository;
use App\Models\User;

class DbApiController extends Controller
{

    protected $users;

    public function __construct(UserRepository $users){

        $this->users = $users;
    }

    /**
     * Get data from DB.
     *
     * @return Json
     */
    public function getByRegex(
        Request $request
    )
    {
        $input = $request->all();
        $id = $input['id'] ?? NULL;
        $first_name = $input['first_name'] ?? NULL;
        $second_name = $input['second_name'] ?? NULL;
        $country = $input['country'] ?? NULL;
        $phone = $input['phone'] ?? NULL;
        $company = $input['company'] ?? NULL;

        $users = $this->users->getUsersByRegex($id, $first_name, $second_name, $country, $phone, $company);
        return response()->json($users);
    }
}