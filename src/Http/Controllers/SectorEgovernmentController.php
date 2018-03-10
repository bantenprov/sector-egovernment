<?php

namespace Bantenprov\SectorEgovernment\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\BudgetAbsorption\Facades\SectorEgovernmentFacade;

/* Models */
use Bantenprov\SectorEgovernment\Models\Bantenprov\SectorEgovernment\SectorEgovernment;

/* Etc */
use Validator;

/**
 * The SectorEgovernmentController class.
 *
 * @package Bantenprov\SectorEgovernment
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class SectorEgovernmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(SectorEgovernment $sector_egovernment)
    {
        $this->sector_egovernment = $sector_egovernment;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('sort')) {
            list($sortCol, $sortDir) = explode('|', $request->sort);

            $query = $this->sector_egovernment->orderBy($sortCol, $sortDir);
        } else {
            $query = $this->sector_egovernment->orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = $request->has('per_page') ? (int) $request->per_page : null;
        $response = $query->paginate($perPage);

        return response()->json($response)
            ->header('Access-Control-Allow-Origin', '*')
            ->header('Access-Control-Allow-Methods', 'GET');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sector_egovernment                 = $this->sector_egovernment;
        $sector_egovernment->id             = null;
        $sector_egovernment->label          = null;
        $sector_egovernment->description    = null;

        $response['sector_egovernment'] = $sector_egovernment;
        $response['loaded'] = true;

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SectorEgovernment  $sector_egovernment
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sector_egovernment = $this->sector_egovernment;

        $validator = Validator::make($request->all(), [
            'label'         => 'required|max:16|unique:sector_egovernments,label',
            'description'   => 'required|max:255',
        ]);

        if($validator->fails()){
            $response['error'] = true;
            $response['message'] = $validator->errors()->first();
        } else {
            $sector_egovernment->label          = $request->label;
            $sector_egovernment->description    = $request->description;
            $sector_egovernment->save();

            $response['error'] = false;
            $response['message'] = 'Success';
        }

        $response['loaded'] = true;

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sector_egovernment = $this->sector_egovernment->findOrFail($id);

        $response['sector_egovernment'] = $sector_egovernment;
        $response['loaded'] = true;

        return response()->json($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SectorEgovernment  $sector_egovernment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sector_egovernment = $this->sector_egovernment->findOrFail($id);

        $response['sector_egovernment'] = $sector_egovernment;
        $response['loaded'] = true;

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SectorEgovernment  $sector_egovernment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $sector_egovernment = $this->sector_egovernment;

        $validator = Validator::make($request->all(), [
            'label'         => 'required|max:16|unique:sector_egovernments,label,'.$id,
            'description'   => 'required|max:255',
        ]);

        if($validator->fails()){
            $response['error'] = true;
            $response['message'] = $validator->errors()->first();
        } else {
            $sector_egovernment->label          = $request->label;
            $sector_egovernment->description    = $request->description;
            $sector_egovernment->save();

            $response['error'] = false;
            $response['message'] = 'Success';
        }

        $response['loaded'] = true;

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SectorEgovernment  $sector_egovernment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sector_egovernment = $this->sector_egovernment->findOrFail($id);

        if ($sector_egovernment->delete()) {
            $response['loaded'] = true;
        } else {
            $response['loaded'] = false;
        }

        return json_encode($response);
    }
}
