<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Truck as Model;
use App\Http\Resources\Truck as Resource;
use Illuminate\Support\Facades\Auth;

class TruckController extends Controller
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

        if (isset($request->description)) {
            $search = $search->where('description', 'like', $request->description);
        }

        if (isset($request->typetruck)) {
            $search = $search->where('typetruck', 'like', $request->typetruck);
        }

        if (isset($request->bodywork)) {
            $search = $search->where('bodywork', 'like', $request->bodywork);
        }

        if (isset($request->volume)) {
            $search = $search->where('volume', 'like', $request->volume);
        }

        if (isset($request->axes)) {
            $search = $search->where('axes', 'like', $request->axes);
        }

        if (isset($request->limit)) {
            $search = $search->where('limit', 'like', $request->limit);
        }

        $search = $search->orderBy('id', 'desc');
        $items = isset($request->nopg) ? $search->get() : $search->paginate($request->pg ?? 10);

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

        if (isset($input['id'])) {
            $item = Model::findOrFail($input['id']);
        } else {
            $item = new Model();
        }

        if (isset($input['description'])) $item->description = $input['description'];
        $item->typetruck = $input['typetruck'];
        $item->bodywork = $input['bodywork'];
        $item->volume = $input['volume'];
        $item->axes = $input['axes'];
        $item->limit = $input['limit'];

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
