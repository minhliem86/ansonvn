<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Categories;

class CategoriesRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Categories::class;
    }
    // END

}