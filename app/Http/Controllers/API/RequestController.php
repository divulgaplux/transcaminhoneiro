<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Request as Model;
use App\Http\Resources\Request as Resource;


class RequestController extends Controller
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

        if (isset($request->shipping_id)) {
            $search = $search->where('shipping_id', 'like', '%'. $request->shipping_id .'%');
        }

        if (isset($request->value)) {
            $search = $search->where('value', 'like', '%'. $request->value .'%');
        }

        if (isset($request->time_approximate)) {
            $search = $search->where('time_approximate', 'like', '%'. $request->time_approximate .'%');
        }

        if (isset($request->observation)) {
            $search = $search->where('observation', 'like', '%'. $request->observation .'%');
        }

        if (isset($request->date)) {
            $search = $search->where('date', 'like', '%'. $request->date .'%');
        }

        if (isset($request->status)) {
            $search = $search->where('status', 'like', '%'. $request->status .'%');
        }

        if (isset($request->date_acceptation)) {
            $search = $search->where('date_acceptation', 'like', '%'. $request->date_acceptation .'%');
        }

        $search = $search->orderBy('id', 'desc');
        $items = isset($request->nopg) ? $search->get() : $search->paginate($request->pg ?? 5);

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
        $item->shipping_id = $input['shipping_id'];
        $item->value = $input['value'];
        if (isset($input['time_approximate'])) $item->time_approximate = $input['time_approximate'];
        if (isset($input['observation'])) $item->observation = $input['observation'];
        $item->date = date('Y-m-d H:i:s');
        $item->status = $input['status'];
        if (isset($input['date_acceptation'])) $item->date_acceptation = date('Y-m-d H:i:s');
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

