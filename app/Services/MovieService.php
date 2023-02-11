<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Repositories\MovieRepository;

class MovieService
{
    private $MovieRepository = null;

    public function __construct(
        MovieRepository $MovieRepository
    )
    {
        $this->MovieRepository = $MovieRepository;
    }
    
    public function findAll()
    {
        return $this->MovieRepository->findByCardIdList([]);
    }

    public function findByCardId($cardId)
    {
        return $this->MovieRepository->findByCardIdList([$cardId]);
    }

    public function findByCardIdList($cardIdList)
    {
        return $this->MovieRepository->findByCardIdList($cardIdList);
    }

    public function findWin()
    {
        return $this->MovieRepository->findByCardIdList([],'win');
    }

    public function findLose()
    {
        return $this->MovieRepository->findByCardIdList([],'lose');
    }
}
