<?php

namespace Bantenprov\SectorEgovernment\Http\Controllers;

/* Require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\SectorEgovernment\Facades\SectorEgovernmentFacade;

/* Models */
use Bantenprov\SectorEgovernment\Models\Bantenprov\SectorEgovernment\SectorEgovernment;
use App\User;

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

    protected  $user;
    protected  $sector_egovernment;

    public function __construct(SectorEgovernment $sector_egovernment, User $user)
    {
        $this->sector_egovernment   = $sector_egovernment;
        $this->user                 = $user;
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
        $response = $query->with('user')->paginate($perPage);

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
        $users = $this->user->all();

        foreach($users as $user){
            array_set($user, 'label', $user->name);
        }

        $response['user'] = $users;
        $response['status'] = true;

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
            'user_id'                   => 'required',
            'label'                     => 'required',
            'description'               => 'required',
            'link'                      => 'required',
        ]);

        if($validator->fails()){
            $check = $sector_egovernment->where('label',$request->label)->whereNull('deleted_at')->count();

            if ($check > 0) {
                $response['message'] = 'Failed, label ' . $request->label . ' already exists';
            } else {
                $sector_egovernment->user_id        = $request->input('user_id');
                $sector_egovernment->label          = $request->input('label');
                $sector_egovernment->description    = $request->input('description');
                $sector_egovernment->link           = $request->input('link');
                $sector_egovernment->save();

                $response['message'] = 'success';
            }
        } else {
            $sector_egovernment->user_id        = $request->input('user_id');
            $sector_egovernment->label          = $request->input('label');
            $sector_egovernment->description    = $request->input('description');
            $sector_egovernment->link           = $request->input('link');
            $sector_egovernment->save();
            $response['message'] = 'success';
        }

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
        $sector_egovernment = $this->sector_egovernment->findOrFail($id);

        $response['sector_egovernment'] = $sector_egovernment;
        $response['user'] = $sector_egovernment->user;
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
        $sector_egovernment = $this->sector_egovernment->findOrFail($id);

        array_set($sector_egovernment->user, 'label', $sector_egovernment->user->name);

        $response['sector_egovernment'] = $sector_egovernment;
        $response['user']               = $sector_egovernment->user;
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
        $response = array();
        $message  = array();

        $sector_egovernment = $this->sector_egovernment->findOrFail($id);
        {
            $validator = Validator::make($request->all(), [
                'label'                 => 'required',
                'description'           => 'required',
                'user_id'               => 'required',
                'link'                  => 'required',
            ]);

             if($validator->fails()){

                foreach($validator->messages()->getMessages() as $key => $error){
                    foreach($error AS $error_get) {
                        array_push($message, $error_get. "\n");
                    }                
                } 
                $response['message'] = $message;

            } else {
                $sector_egovernment->label                    = $request->input('label');
                $sector_egovernment->description              = $request->input('description');
                $sector_egovernment->link                     = $request->input('link');
                $sector_egovernment->user_id                  = $request->input('user_id');
                $sector_egovernment->save();

                $response['message'] = 'success';
            }

        $response['status'] = true;

        return response()->json($response);
    }
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
