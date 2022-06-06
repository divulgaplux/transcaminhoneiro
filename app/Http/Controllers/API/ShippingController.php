<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Shipping as Model;
use App\Http\Resources\Shipping as Resource;

class ShippingController extends Controller
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

        if (isset($request->truck_id)) {
            $search = $search->where('truck_id', 'like', $request->truck_id);
        }

        if (isset($request->client)) {
            $search = $search->where('client', 'like', $request->client);
        }

        if (isset($request->email)) {
            $search = $search->where('email', 'like', $request->email);
        }

        if (isset($request->telephone)) {
            $search = $search->where('telephone', 'like', $request->telephone);
        }

        if (isset($request->cellphone)) {
            $search = $search->where('cellphone', 'like', $request->cellphone);
        }

        if (isset($request->receiver)) {
            $search = $search->where('receiver', 'like', $request->receiver);
        }

        if (isset($request->origin)) {
            $search = $search->where('origin', 'like', $request->origin);
        }

        if (isset($request->destination)) {
            $search = $search->where('destination', 'like', $request->destination);
        }

        if (isset($request->weight)) {
            $search = $search->where('weight', 'like', $request->weight);
        }

        if (isset($request->value_suggested)) {
            $search = $search->where('value_suggested', 'like', $request->value_suggested);
        }

        if (isset($request->insurance_price)) {
            $search = $search->where('insurance_price', 'like', $request->insurance_price);
        }

        if (isset($request->distance)) {
            $search = $search->where('distance', 'like', $request->distance);
        }

        if (isset($request->company_truck_id)) {
            $search = $search->where('company_truck_id', 'like', $request->company_truck_id);
        }

        if (isset($request->request_id)) {
            $search = $search->where('request_id', 'like', $request_id);
        }

        if (isset($request->status)) {
            $search = $search->where('status', $request->status);
        }

        if (isset($request->have_insurance)) {
            $search = $search->where('have_insurance', FALSE);
        }


        $search = $search->orderBy('id', 'desc');
        $items = isset($request->nopg) ? $search->get() : $search->paginate($request->pg ?? 12);
        // $items = isset($request->nopg) ? $search->get() : $search->paginate(6);

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

        if (isset($input['truck_id'])) $item->truck_id = $input['truck_id'];
        if (isset($input['client'])) $item->client = $input['client'];
        if (isset($input['receiver'])) $item->receiver = $input['receiver'];
        if (isset($input['email'])) $item->email = $input['email'];
        if (isset($input['telephone'])) $item->telephone = $input['telephone'];
        if (isset($input['cellphone'])) $item->cellphone = $input['cellphone'];

        $item->origin = $input['origin'];
        $item->destination = $input['destination'];
        $item->weight = $input['weight'];
        $item->value_suggested = $input['value_suggested'];

        if (isset($input['insurance_price'])) $item->insurance_price = $input['insurance_price'];
        if (isset($input['distance'])) $item->distance = $input['distance'];

        if (isset($input['company_truck_id'])) $item->company_truck_id = $input['company_truck_id'];

        if (isset($input['status'])) $item->status = $input['status'];

        $item->have_insurance = $input['have_insurance'];

        if (isset($input['request_id'])) $item->request_id = $input['request_id'];

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

    public function calculateShipping(Request $request)
    {
        return response()->json([
            'ola' => 'ola'
        ]);
    }
}
