<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Category;

class CategoriesRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Category::class;
    }
    // END

}