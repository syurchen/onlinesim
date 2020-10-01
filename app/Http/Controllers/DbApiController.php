<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

class DbApiController extends Controller
{
    /**
     * Get data from DB.
     *
     * @return Json
     */
    public function getByRegex(
        $id = NULL,
        $firstName = NULL,
        $secondName = NULL,
        $country = NULL,
        $phone = NULL,
        $company = NULL
    )
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }
}