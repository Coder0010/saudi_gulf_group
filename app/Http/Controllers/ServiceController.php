<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Exception;
use App\Models\Client;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Http\Requests\ServiceRequest;
use Facades\App\Libraries\MediaLibrary;

class ServiceController extends Controller
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
        return view('backend.services.index',[
            'services'   => Service::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.services.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\ServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ServiceRequest $request)
    {
        DB::beginTransaction();
        try {
            $entity = Service::create($request->validated());
            if ($entity) {
                MediaLibrary::storeOrUpdate($entity, "image");
                $entity->clients()->syncWithoutDetaching($request->clients);
                $entity->portfolios()->syncWithoutDetaching($request->portfolios);
                Session::flash("success", " [ $entity->name ] created successfully" );
            } else {
                Session::flash("danger", "failed to create record");
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("danger", $e->getMessage());
        }
        return redirect()->route('backend.services.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service)
    {
        return view('backend.services.edit',[
            'entity' => $service,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\ServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceRequest $request, Service $service)
    {
        DB::beginTransaction();
        try {
            $entity = $service->update($request->validated());
            MediaLibrary::storeOrUpdate($service, "image");
            if ($entity) {
                Session::flash("success", " [ $service->name ] updated successfully" );
            } else {
                Session::flash("danger", "failed to update record");
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("danger", $e->getMessage());
        }
        return redirect()->route('backend.services.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        DB::beginTransaction();
        try {
            $entity = $service->delete();
            if ($entity) {
                Session::flash("success", " [ $service->name ] deleted successfully" );
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
