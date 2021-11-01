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
                'type'  => 'ask-for-coupon',
                'name'  => $request->name,
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

    public function contactUs()
    {
        return view('frontend.contact-us');
    }

    public function ourStory()
    {
        return view('frontend.our-story');
    }

    public function contactUsRequest(Request $request)
    {
        $this->validate(request(), [
            'name'  => 'required|string',
            'phone' => 'required',
        ]);
        DB::beginTransaction();
        try {
            $entity = Lead::create([
                'type'    => 'contact-us',
                'name'    => $request->name,
                'phone'   => $request->phone,
                'email'   => $request->email,
                'data'    => [
                    'services' => $request->services,
                    'company'  => $request->company,
                ],
                'subject'     => $request->subject,
                'description' => $request->description,
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
}
