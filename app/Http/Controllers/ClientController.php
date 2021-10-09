<?php

namespace App\Http\Controllers;

use DB;
use Cache;
use Session;
use Exception;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Http\Resources\ClientResource;
use Facades\App\Libraries\MediaLibrary;

class ClientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.clients.index',[
            'clients' => Client::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.clients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        DB::beginTransaction();
        try {
            $entity = Client::create($request->validated());
            if ($entity) {
                MediaLibrary::storeOrUpdate($entity, "image");
                Session::flash("success", " [ $entity->name ] created successfully");
            } else {
                Session::flash("danger", "failed to create record");
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("danger", $e->getMessage());
        }
        return redirect()->route('backend.clients.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function edit(Client $client)
    {
        return view('backend.clients.edit', [
            'entity' => $client
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ClientRequest  $request
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, Client $client)
    {
        DB::beginTransaction();
        try {
            $entity = $client->update($request->validated());
            MediaLibrary::storeOrUpdate($client, "image");
            if ($entity) {
                Session::flash("success", " [ $client->name ] updated successfully");
            } else {
                Session::flash("danger", "failed to update record");
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("danger", $e->getMessage());
        }
        return redirect()->route('backend.clients.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        DB::beginTransaction();
        try {
            $entity = $client->delete();
            if ($entity) {
                Session::flash("success", " [ $client->name ] deleted successfully");
            } else {
                Session::flash("danger", "failed to delete record");
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("danger", $e->getMessage());
        }
        return redirect()->back();
    }
}
