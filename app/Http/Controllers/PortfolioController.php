<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Exception;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Facades\App\Libraries\MediaLibrary;
use App\Http\Requests\PortfolioRequest;

class PortfolioController extends Controller
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
        return view('backend.portfolios.index',[
            'portfolios' => Portfolio::latest()->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.portfolios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\PortfolioRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PortfolioRequest $request)
    {
        DB::beginTransaction();
        try {
            $entity = Portfolio::create($request->validated());
            if ($entity) {
                MediaLibrary::storeOrUpdate($entity, "image");
                Session::flash("success", " [ $entity->name ] created successfully" );
            } else {
                Session::flash("danger", "failed to create record");
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("danger", $e->getMessage());
        }
        return redirect()->route('backend.portfolios.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function edit(Portfolio $portfolio)
    {
        return view('backend.portfolios.edit',[
            'entity' => $portfolio
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\PortfolioRequest  $request
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function update(PortfolioRequest $request, Portfolio $portfolio)
    {
        DB::beginTransaction();
        try {
            $entity = $portfolio->update($request->validated());
            MediaLibrary::storeOrUpdate($portfolio, "image");
            if ($entity) {
                Session::flash("success", " [ $portfolio->name ] updated successfully" );
            } else {
                Session::flash("danger", "failed to update record");
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("danger", $e->getMessage());
        }
        return redirect()->route('backend.portfolios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Portfolio  $portfolio
     * @return \Illuminate\Http\Response
     */
    public function destroy(Portfolio $portfolio)
    {
        DB::beginTransaction();
        try {
            $entity = $portfolio->delete();
            if ($entity) {
                Session::flash("success", " [ $portfolio->name ] deleted successfully" );
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
