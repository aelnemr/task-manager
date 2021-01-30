<?php
namespace App\Services;


use Illuminate\Database\Eloquent\Collection;

class UserListResponse implements ResponseJson
{
    protected $model;

    public function __construct(\Illuminate\Database\Eloquent\Model $model)
    {
        $this->model = $model;
    }

    public function toArray()
    {
        return [
            'id' => $this->model->id,
            'name' => $this->model->name,
            'created_from' => $this->model->created_at ? $this->model->created_at->diffForHumans() : ""
        ];
    }

    public static function collection(Collection $collection)
    {
        $data = [];
        foreach ($collection as $item) {
            $user = new UserListResponse($item);
            $data[] = $user->toArray();
        }

        return $data;
    }
}
