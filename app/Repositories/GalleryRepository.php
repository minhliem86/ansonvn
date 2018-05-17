<?php
namespace App\Repositories;

use App\Repositories\Contract\RestfulInterface;
use App\Repositories\Eloquent\BaseRepository;
use App\Models\Gallery;

class GalleryRepository extends BaseRepository implements RestfulInterface{

    public function getModel()
    {
        return Gallery::class;
    }
    // END

}