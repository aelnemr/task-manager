<?php
namespace App\Services;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface ResponseJson
{
    public function __construct(Model $model);

    public function toArray();

    public static function collection(Collection $collection);
}
