<?php

namespace App\Service;


use App\Test;
use Illuminate\Database\Eloquent\Collection;

class TestService
{
    public function createTestEntity(string $name): Test
    {
        $test = new Test();
        $test->name = $name;
        $test->save();

        return $test;
    }

    public function getListOfItems(): Collection
    {
        return Test::all();
    }

    public function deleteById(int $id) {
        return Test::query()->where('id', $id)->delete();
    }
}