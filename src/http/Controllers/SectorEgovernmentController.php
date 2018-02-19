<?php namespace Bantenprov\SectorEgovernment\Http\Controllers;

/* require */
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Bantenprov\SectorEgovernment\Facades\SectorEgovernment;

/* Models */
use Bantenprov\SectorEgovernment\Models\Bantenprov\SectorEgovernment\SectorEgovernment as PdrbModel;
use Bantenprov\SectorEgovernment\Models\Bantenprov\SectorEgovernment\Province;
use Bantenprov\SectorEgovernment\Models\Bantenprov\SectorEgovernment\Regency;

/* etc */
use Validator;

/**
 * The SectorEgovernmentController class.
 *
 * @package Bantenprov\SectorEgovernment
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class SectorEgovernmentController extends Controller
{

    protected $province;

    protected $regency;

    protected $sector_egovernment;

    public function __construct(Regency $regency, Province $province, PdrbModel $sector_egovernment)
    {
        $this->regency  = $regency;
        $this->province = $province;
        $this->sector_egovernment     = $sector_egovernment;
    }

    public function index(Request $request)
    {
        /* todo : return json */

        return 'index';

    }

    public function create()
    {

        return response()->json([
            'provinces' => $this->province->all(),
            'regencies' => $this->regency->all()
        ]);
    }

    public function show($id)
    {

        $sector_egovernment = $this->sector_egovernment->find($id);

        return response()->json([
            'negara'    => $sector_egovernment->negara,
            'province'  => $sector_egovernment->getProvince->name,
            'regencies' => $sector_egovernment->getRegency->name,
            'tahun'     => $sector_egovernment->tahun,
            'data'      => $sector_egovernment->data
        ]);
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(),[
            'negara'        => 'required',
            'province_id'   => 'required',
            'regency_id'    => 'required',
            'kab_kota'      => 'required',
            'tahun'         => 'required|integer',
            'data'          => 'required|integer',
        ]);

        if($validator->fails())
        {
            return response()->json([
                'title'     => 'error',
                'message'   => 'add failed',
                'type'      => 'failed',
                'errors'    => $validator->errors()
            ]);
        }

        $check = $this->sector_egovernment->where('regency_id',$request->regency_id)->where('tahun',$request->tahun)->count();

        if($check > 0)
        {
            return response()->json([
                'title'         => 'error',
                'message'       => 'Data allready exist',
                'type'          => 'failed',
            ]);

        }else{
            $data = $this->sector_egovernment->create($request->all());

            return response()->json([
                    'type'      => 'success',
                    'title'     => 'success',
                    'id'      => $data->id,
                    'message'   => 'PDRB '. $this->regency->find($request->regency_id)->name .' tahun '. $request->tahun .' successfully created',
                ]);
        }

    }

    public function update(Request $request, $id)
    {
        /* todo : return json */
        return '';

    }

    public function destroy($id)
    {
        /* todo : return json */
        return '';

    }
}

