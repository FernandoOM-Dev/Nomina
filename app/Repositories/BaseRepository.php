<?php


namespace App\Repositories;


use Illuminate\Database\Eloquent\Model;
use App\contracts\BaseRepositoryInterface;
use Illuminate\Http\Request;

class BaseRepository implements BaseRepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

    public function get($id)
    {
        return $this->model->findOrFail($id);
    }

    public function save(Model $model, Request $request)
    {
        $model->create($request->all());
        return $model;
    }

    public function update(Model $model, Request $request)
    {
        $model->update($request->all());
        return $model;
    }

}
