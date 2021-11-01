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
            'generalSection'   => Section::whereType('general-section')->first(),
            'contactUsSection' => Section::whereType('contactUs-section')->first(),
            'welcomeSection'   => Section::whereType('welcome-section')->first(),
            'couponSection'    => Section::whereType('coupon-section')->first(),
            'storySection'     => Section::whereType('story-section')->first(),
            'serviceSection'   => Section::whereType('service-section')->first(),
            'portfolioSection' => Section::whereType('portfolio-section')->first(),
        ]);
    }

    public function updateSection(Request $request)
    {
        $this->validate(request(), [
            'name'            => 'required|string',
            'sub_name'        => 'sometimes|nullable|string',
            'description'     => 'sometimes|nullable|string',
            'sub_description' => 'sometimes|nullable|string',
            'services'        => 'required_if:type,welcome_section|array',
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
