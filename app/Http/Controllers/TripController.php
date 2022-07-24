<?php
namespace App\Http\Controllers;

use App\Http\Requests\TripRequest;
use App\Http\Requests\TripStausUpdateRequest;

use App\Jobs\SendTripReviewEmailJob;

use App\Services\CustomerServices;
use App\Services\LocationServices;
use App\Services\TripServices;

use Auth;

class TripController extends Controller
{
    protected $tripServices;

    public function __construct(TripServices $tripServices)
    {
        $this->tripServices = $tripServices;
    }

    /**
     * Show the trip list.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $trips = $this
            ->tripServices
            ->getAllTrip();
        $data = ["trips" => $trips];
        return view('trip/index', $data);
    }

    /**
     * Show the trip create form.
     *
     * @param \App\Services\CustomerServices
     * @param \App\Services\locationServices
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(CustomerServices $customerServices, LocationServices $locationServices)
    {
        $locations = $locationServices->getAllLocation();
        $customers = $customerServices->getAllCustomers();
        $data = ["customers" => $customers, "locations" => $locations, ];
        return view('trip/create', $data);
    }

    /**
     * Store the trip data in database.
     *
     * @param App\Http\Requests\TripRequest
     * @return Redirect
     */
    public function store(TripRequest $request)
    {
        $this
            ->tripServices
            ->storeTrip($request, Auth::id());
        return redirect()->to('trip')
            ->with('message', 'Trip booked successfully');
    }

    /**
     * Update trip status.
     *
     * @param App\Http\Requests\TripStausUpdateRequest
     * @return string
     */
    public function statusUpdate(TripStausUpdateRequest $request)
    {
        $this
            ->tripServices
            ->updateStatus($request, Auth::id());
        $details = $this
            ->tripServices
            ->fetchTripDetail($request->trip_id);
        dispatch(new SendTripReviewEmailJob($details));
        return response()->json(['status' => true], 200);
    }
}

?>