<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Contract as Model;
use App\Http\Resources\Contract as Resource;

class ContractController extends Controller
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

        if (isset($request->client_id)) {
            $search = $search->where('client_id', 'like', '%'. $request->client_id .'%');
        }

        if (isset($request->truck_id)) {
            $search = $search->where('truck_id', 'like', '%'. $request->truck_id .'%');
        }

        if (isset($request->services)) {
            $search = $search->where('services', 'like', '%'. $request->services .'%');
        }

        if (isset($request->collect)) {
            $search = $search->where('collect', 'like', '%'. $request->collect .'%');
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

        if (isset($input['truck_id'])) $item->truck_id = $input['truck_id'];
        if (isset($input['client_id'])) $item->client_id = $input['client_id'];
        if (isset($input['company_id'])) $item->company_id = $input['company_id'];
        if (isset($input['services'])) $item->services = $input['services'];
        if (isset($input['collect'])) $item->collect = $input['collect'];
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

