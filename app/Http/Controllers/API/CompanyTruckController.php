<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\CompanyTruck as Model;
use App\Http\Resources\CompanyTruck as Resource;

class CompanyTruckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = new Model;

        if (!isset($request->all)) {
            $search = $search->where('is_actived', TRUE);
        }

        if (isset($request->company_id)) {
            $search = $search->where('company_id', 'like', '%'. $request->company_id .'%');
        }

        if (isset($request->truck_id)) {
            $search = $search->where('truck_id', 'like', '%'. $request->truck_id .'%');
        }

        if (isset($request->board)) {
            $search = $search->where('board', 'like', '%'. $request->board .'%');
        }

        if (isset($request->renavam)) {
            $search = $search->where('renavam', 'like', '%'. $request->renavam .'%');
        }

        if (isset($request->brand)) {
            $search = $search->where('brand', 'like', '%'. $request->brand .'%');
        }

        if (isset($request->color)) {
            $search = $search->where('color', 'like', '%'. $request->color .'%');
        }

        if (isset($request->city)) {
            $search = $search->where('city', 'like', '%'. $request->city .'%');
        }

        if (isset($request->chassi)) {
            $search = $search->where('chassi', 'like', '%'. $request->chassi .'%');
        }

        if (isset($request->model)) {
            $search = $search->where('model', 'like', '%'. $request->model .'%');
        }

        if (isset($request->state)) {
            $search = $search->where('state', 'like', '%'. $request->state .'%');
        }

        if (isset($request->country)) {
            $search = $search->where('country', 'like', '%'. $request->country .'%');
        }

        if (isset($request->technology)) {
            $search = $search->where('technology', 'like', '%'. $request->technology .'%');
        }

        if (isset($request->year_of_manufacture)) {
            $search = $search->where('year_of_manufacture', 'like', '%'. $request->year_of_manufacture .'%');
        }

        if (isset($request->year_of_model )) {
            $search = $search->where('year_of_model ', 'like', '%'. $request->year_of_model .'%');
        }
        $search = $search->orderBy('id', 'desc');
        $items = isset($request->nopg) ? $search->get() : $search->paginate($request->pg ?? 20);

        return Resource::collection($items);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();

        if ( isset($input['id']) ) {
            $item = Model::findOrFail($input['id']);
        } else {
            $item = new Model();
        }

        $item->company_id = $input['company_id'];
        $item->truck_id = $input['truck_id'];
        if (isset($input['board'])) $item->board = $input['board'];
        if (isset($input['renavam'])) $item->renavam = $input['renavam'];
        if (isset($input['brand'])) $item->brand = $input['brand'];
        if (isset($input['color'])) $item->color = $input['color'];
        if (isset($input['city'])) $item->city = $input['city'];
        if (isset($input['chassi'])) $item->chassi = $input['chassi'];
        if (isset($input['model'])) $item->model = $input['model'];
        if (isset($input['state'])) $item->state = $input['state'];
        if (isset($input['country'])) $item->country = $input['country'];
        if (isset($input['technology'])) $item->technology = $input['technology'];
        if (isset($input['year_of_manufacture'])) $item->year_of_manufacture = $input['year_of_manufacture'];
        if (isset($input['year_of_model'])) $item->year_of_model = $input['year_of_model'];
        $item->is_actived = $input['is_actived'];

        if ($item->save()) {
            return new Resource($item);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $search = Model::findOrFail($id);
        return new Resource($search);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $search = Model::findOrFail($id);
        $search->is_actived = FALSE;
        if ($search->save()) {
            return new Resource($search);
        }
    }
}
