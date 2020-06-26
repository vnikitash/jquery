<?php
/**
 * Created by PhpStorm.
 * User: viktor
 * Date: 26.06.2020
 * Time: 19:46
 */

namespace App\Http\Controllers;


use App\Http\Requests\CreateTestRequest;
use App\Service\TestService;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TestController
{

    private $service;

    public function __construct(TestService $service)
    {
        $this->service = $service;
    }

    //GET /products
    public function index(Request $request)
    {
        return view('home');
    }

    //GET /test/1
    public function show($testId)
    {

    }

    //POST /test
    public function store(CreateTestRequest $request)
    {
        $data = $request->validated();

        return $this->service->createTestEntity(Arr::get($data, 'name'));
    }

    //PUT/PATCH /products/11
    public function update(Request $request, $idToUpdate)
    {
        die("UPDATE TEST BY ID: $idToUpdate");
    }

    //DELETE /products/id
    public function destroy($destroyId)
    {
        return $this->service->deleteById($destroyId);
    }

    public function getListAsJson()
    {
        return $this->service->getListOfItems();
    }
}