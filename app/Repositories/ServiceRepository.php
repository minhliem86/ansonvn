<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Service;

class ServiceRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Service::class;
    }
    // END

}