<?php
/**
 * Created by PhpStorm.
 * User: viktor
 * Date: 26.06.2020
 * Time: 19:46
 */

namespace App\Http\Controllers;


use Illuminate\Http\Request;

class TestController
{
    //GET /products
    public function index(Request $request)
    {
        return view('home');
    }

    //GET /products/1
    public function show($testId)
    {

    }

    //POST /test
    public function store()
    {
        die("test POST");
    }

    //PUT/PATCH /products/11
    public function update(Request $request, $idToUpdate)
    {
        die("UPDATE TEST BY ID: $idToUpdate");
    }

    //DELETE /products/id
    public function destroy($destroyId)
    {
        die("DELETE $destroyId");
    }
}