<?php
namespace App\Http\Controllers;

use App\Http\Requests\LocationDistanceRequest;
use App\Services\LocationServices;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    protected $locationServices;

    public function __construct(LocationServices $locationServices)
    {
        $this->locationServices = $locationServices;
    }

    /**
     * fetch location distance details.
     *
     * @param App\Http\Requests\LocationDistanceRequest
     * @return string
     */
    public function getLocationDistance(LocationDistanceRequest $request)
    {
        $distance = $this
            ->locationServices
            ->getDistanceBtwnLocation($request->from_location_id, $request->to_location_id);

        return response()
            ->json(['distance' => $distance, 'status' => true], 200);
    }
}

?>