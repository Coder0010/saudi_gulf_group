<?php

namespace App\Http\Controllers;

use DB;
use Session;
use App\Models\Package;
use Illuminate\Http\Request;
use Facades\App\Libraries\MediaLibrary;
use App\Http\Requests\PackageRequest;

class PackageController extends Controller
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
        return view('backend.packages.index',[
            'packages' => Package::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.packages.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PackageRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PackageRequest $request)
    {
        DB::beginTransaction();
        try {
            $entity = Package::create($request->validated());
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
        return redirect()->route('backend.packages.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function edit(Package $package)
    {
        return view('backend.packages.edit', [
            'entity' => $package
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PackageRequest  $request
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function update(PackageRequest $request, Package $package)
    {
        DB::beginTransaction();
        try {
            $entity = $package->update($request->validated());
            MediaLibrary::storeOrUpdate($package, "image");
            if ($entity) {
                Session::flash("success", " [ $package->name ] updated successfully");
            } else {
                Session::flash("danger", "failed to update record");
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("danger", $e->getMessage());
        }
        return redirect()->route('backend.packages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Package  $package
     * @return \Illuminate\Http\Response
     */
    public function destroy(Package $package)
    {
        DB::beginTransaction();
        try {
            $entity = $package->delete();
            if ($entity) {
                Session::flash("success", " [ $package->name ] deleted successfully");
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
