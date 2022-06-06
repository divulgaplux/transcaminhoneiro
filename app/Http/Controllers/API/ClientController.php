<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Client as Model;
use App\Http\Resources\Client as Resource;

class ClientController extends Controller
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

        if (isset($request->name)) {
            $search = $search->where('name', 'like', '%'. $request->name .'%');
        }

        if (isset($request->cpf)) {
            $search = $search->where('cpf', 'like', '%'. $request->cpf .'%');
        }

        if (isset($request->rg)) {
            $search = $search->where('rg', 'like', '%'. $request->rg .'%');
        }

        if (isset($request->cnh)) {
            $search = $search->where('cnh', 'like', '%'. $request->cnh .'%');
        }

        if (isset($request->cnh_state)) {
            $search = $search->where('cnh_state', 'like', '%'. $request->cnh_state .'%');
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

        if (isset($input['company_id'])) $item->company_id = $input['company_id'];
        if (isset($input['name'])) $item->name = $input['name'];
        if (isset($input['cpf'])) $item->cpf = $input['cpf'];
        if (isset($input['rg'])) $item->rg = $input['rg'];
        if (isset($input['cnh'])) $item->cnh = $input['cnh'];
        if (isset($input['cnh_state'])) $item->cnh_state = $input['cnh_state'];
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
