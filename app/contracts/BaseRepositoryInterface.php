<?php


namespace App\Contracts;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface BaseRepositoryInterface
{
    public function all();

    public function get($id);

    public function save(Model $model, Request $request);

    public function update(Model $model, Request $request);
}
