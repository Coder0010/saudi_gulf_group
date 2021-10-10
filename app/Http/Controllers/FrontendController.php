<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Exception;
use App\Models\Lead;
use App\Models\Service;
use App\Models\Portfolio;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function couponRequest(Request $request)
    {
        $this->validate(request(), [
            'name'  => 'required|string',
            'email' => 'required|email',
        ]);
        DB::beginTransaction();
        try {
            $entity = Lead::create([
                'name'  => $request->name,
                'type'  => 'ask-for-coupon',
                'email' => $request->email,
            ]);
            if ($entity) {
                Session::flash("success", " [ $entity->name ] created successfully");
            } else {
                Session::flash("danger", "failed to create record");
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("danger", $e->getMessage());
        }
        return redirect()->back();
    }

    public function portfoliosIndex()
    {
        return view('frontend.portfolios.index');
    }

    public function portfoliosShow(Portfolio $portfolio)
    {
        return view('frontend.portfolios.show',[
            'portfolio' => $portfolio
        ]);
    }

    public function servicesIndex()
    {
        return view('frontend.services.index');
    }

    public function servicesShow(Service $service)
    {
        return view('frontend.services.show',[
            'service' => $service
        ]);
    }
}
