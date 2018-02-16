<?php

namespace Bantenprov\SectorEgovernment\Http\Controllers;

use Bantenprov\SectorEgovernment\Models\Bantenprov\SectorEgovernment\SectorEgovernment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
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
    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (request()->has('sort')) {
            list($sortCol, $sortDir) = explode('|', request()->sort);

            $query = SectorEgovernment::orderBy($sortCol, $sortDir);
        } else {
            $query = SectorEgovernment::orderBy('id', 'asc');
        }

        if ($request->exists('filter')) {
            $query->where(function($q) use($request) {
                $value = "%{$request->filter}%";
                $q->where('label', 'like', $value)
                    ->orWhere('description', 'like', $value);
            });
        }

        $perPage = request()->has('per_page') ? (int) request()->per_page : null;
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
        $sector_egovernment = new SectorEgovernment;

        $response['sector_egovernment'] = $sector_egovernment;
        $response['status'] = true;

        return response()->json($sector_egovernment);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SectorEgovernment  $sector_egovernment
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $sector_egovernment = new SectorEgovernment;

        $this->validate($request, [
            'label' => 'required|max:16',
            'description' => 'max:255',
        ]);

        $sector_egovernment->label = $request->get('label');
        $sector_egovernment->description = $request->get('description');
        $sector_egovernment->save();

        $response['status'] = true;

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
        $sector_egovernment = SectorEgovernment::findOrFail($id);

        $response['sector_egovernment'] = $sector_egovernment;
        $response['status'] = true;

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
        $sector_egovernment = SectorEgovernment::findOrFail($id);

        $response['sector_egovernment'] = $sector_egovernment;
        $response['status'] = true;

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
        $sector_egovernment = SectorEgovernment::findOrFail($id);

        if($request->get('old_label') == $request->get('label'))
        {
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16',
                'description' => 'max:255',
            ]);

        }else{
            $validator = Validator::make($request->all(), [
                'label' => 'required|max:16|unique:sector_egovernments,label',
                'description' => 'max:255',
            ]);
        }


        if($validator->fails()){
            $response['message'] = 'Failed, label ' . $request->label . ' already exists';
        }else{
            $response['message'] = 'success';
            $sector_egovernment->label = $request->get('label');
            $sector_egovernment->description = $request->get('description');
            $sector_egovernment->save();
        }



        $response['status'] = true;


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
        $sector_egovernment = SectorEgovernment::findOrFail($id);

        if ($sector_egovernment->delete()) {
            $response['status'] = true;
        } else {
            $response['status'] = false;
        }

        return json_encode($response);
    }
}

