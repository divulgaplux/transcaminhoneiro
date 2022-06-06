<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Rating as Model;
use App\Http\Resources\Rating as Resource;

class RatingController extends Controller
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

        if (isset($request->shipping_id)) {
            $search = $search->where('shipping_id', 'like', '%'. $request->shipping_id .'%');
        }

        if (isset($request->rated_id)) {
            $search = $search->where('rated_id', 'like', '%'. $request->rated_id .'%');
        }

        if (isset($request->evaluator_id)) {
            $search = $search->where('evaluator_id', 'like', '%'. $request->evaluator_id .'%');
        }

        if (isset($request->description)) {
            $search = $search->where('description', 'like', '%'. $request->description .'%');
        }

        if (isset($request->evaluation)) {
            $search = $search->where('evaluation', 'like', '%'. $request->evaluation .'%');
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

        $item->shipping_id = $input['shipping_id'];
        $item->rated_id = $input['rated_id'];
        $item->evaluator_id = $input['evaluator_id'];
        $item->description = $input['description'];

        $item->evaluation = $input['evaluation'];

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
