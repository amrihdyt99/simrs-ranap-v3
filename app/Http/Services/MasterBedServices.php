<?php

namespace App\Http\Services;

use App\Repository\MasterBedRepository;
use App\Traits\ResponseDataTraits;

class MasterBedServices
{
    use ResponseDataTraits;
    protected $bedRepo;
    public function __construct(MasterBedRepository $masterBedRepository)
    {
        $this->bedRepo = $masterBedRepository;
    }

    public function getBedByClassCode($class_code)
    {
        try {
            $beds = $this->bedRepo->getBedByClassCode($class_code);
            if (!count($beds)) return $this->notFound('Bed not found');
            return $this->responseData(200, 'OK', $beds);
        } catch (\Throwable $th) {
            return $this->internalServerError($th->getMessage());
        }
    }
}
