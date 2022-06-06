<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Company as Model;
use App\Http\Resources\Company as Resource;
use Illuminate\Support\Facades\Auth;

class CompanyController extends Controller
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

        if (isset($request->documentation)) {
            $search = $search->where('documentation', 'like', $request->documentation);
        }

        if (isset($request->email)) {
            $search = $search->where('email', 'like', $request->email);
        }

        if (isset($request->corporative_name)) {
            $search = $search->where('corporative_name', 'like', $request->corporative_name);
        }

        if (isset($request->fantasy_name)) {
            $search = $search->where('fantasy_name', 'like', $request->fantasy_name);
        }

        if (isset($request->adress)) {
            $search = $search->where('adress', 'like', $request->adress);
        }

        if (isset($request->number)) {
            $search = $search->where('number', 'like', $request->number);
        }

        if (isset($request->neighborhood)) {
            $search = $search->where('neighborhood', 'like', $request->neighborhood);
        }

        if (isset($request->city)) {
            $search = $search->where('city', 'like', $request->city);
        }

        if (isset($request->state)) {
            $search = $search->where('state', 'like', $request->state);
        }

        if (isset($request->country)) {
            $search = $search->where('country', 'like', $request->country);
        }

        // if (isset($request->type)) {
        //     if ( $request->type == "T" ) {
        //         $search = $search->where('is_truck', TRUE);
        //     } else if ( $request->type == "C" ) {
        //         $search = $search->where('is_client', TRUE);
        //     } else if ( $request->type == "R" ) {
        //         $search = $search->where('is_recipent', TRUE);
        //     }
        // }

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

        // $validatedData = $request->validate([
        //     'name' => 'required|string',
        //     'documentation' => 'required|string|min:14',
        //     'email' => 'required|string|email:rfc,dns|unique:users,email',
        //     'fantasyname' => 'required|string',
        //     'adress' => 'required|string',
        //     'number' => 'required|string',
        //     'neighborhod' => 'required|string',
        //     'city' => 'required|string',
        //     'state' => 'required|string',
        //     'country' => 'required|string',
        //     'telephone' => 'required|string|min:10',
        //     'cellphone' => 'required|string|min:11',
        // ]);

        if (isset($input['id'])) {
            $item = Model::findOrFail($input['id']);
        } else {
            $item = new Model();
        }

        // if ( isset($input['user_id']) ) {
        //     $item->user_id = $input['user_id'];
        // } else {
        //     $item->user_id = Auth::user()->id;
        // }

        // $item->user_id = $input['user_id'];
        $item->documentation = $input['documentation'];
        $item->email = $input['email'];
        $item->corporative_name = $input['corporative_name'];
        if (isset($input['fantasy_name'])) $item->fantasy_name = $input['fantasy_name'];
        $item->adress = $input['adress'];
        $item->number = $input['number'];
        $item->neighborhood = $input['neighborhood'];
        $item->city = $input['city'];
        $item->state = $input['state'];
        $item->country = $input['country'];

        if (isset($input['phone'])) $item->phone = $input['phone'];
        if (isset($input['cellphone'])) $item->cellphone = $input['cellphone'];

        // $item->ranking = $input['ranking'];
        // $item->quatities = $input['quatities'];
        // $item->is_truck = $input['is_truck'];
        // $item->is_client = $input['is_client'];
        // $item->is_recipent = $input['is_recipent'];
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
