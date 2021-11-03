<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Exception;
use App\Models\Lead;
use App\Models\Section;
use Illuminate\Http\Request;

class BackendController extends Controller
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.sections.index',[
            'aboutUsSection'        => Section::whereType('about-us-section')->first(),
            'contactUsSection'      => Section::whereType('contact-us-section')->first(),
            'sliderSection'        => Section::whereType('slider-section')->first(),
            'couponSection'         => Section::whereType('coupon-section')->first(),
            'storySection'          => Section::whereType('story-section')->first(),
            'serviceSection'        => Section::whereType('service-section')->first(),
            'integratedSection'     => Section::whereType('integrated-section')->first(),
            'portfolioSection'      => Section::whereType('portfolio-section')->first(),
            'storyPageOneSection'   => Section::whereType('story-page-one-section')->first(),
            'storyPageTwoSection'   => Section::whereType('story-page-two-section')->first(),
            'storyPageThreeSection' => Section::whereType('story-page-three-section')->first(),
            'storyPageFourSection'  => Section::whereType('story-page-four-section')->first(),
        ]);
    }

    public function updateSection(Request $request)
    {
        $this->validate(request(), [
            'name'            => 'required|string',
            'sub_name'        => 'sometimes|nullable|string',
            'description'     => 'sometimes|nullable|string',
            'sub_description' => 'sometimes|nullable|string',
            'services'        => 'required_if:type,slider-section|array',
            'services.*'      => 'required|integer|exists:services,id,deleted_at,NULL',
        ]);
        DB::beginTransaction();
        try {
            $entity = Section::whereType($request->type)->firstOrFail();
            if ($entity) {
                $entity->update($request->all());
                Session::flash("type", $request->type);
                Session::flash("success", " [ $request->type ] updated successfully");
            } else {
                Session::flash("danger", "failed to update record");
            }
            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
            Session::flash("danger", $e->getMessage());
        }
        return redirect()->back();
    }

    public function leadsIndex()
    {
        return view('backend.leads.index',[
            'leads'   => Lead::latest()->get(),
        ]);
    }
}
