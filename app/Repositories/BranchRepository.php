<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Branch;

class BranchRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Branch::class;
    }
    // END

}