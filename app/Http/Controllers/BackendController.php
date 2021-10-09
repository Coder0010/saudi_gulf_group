<?php

namespace App\Http\Controllers;

use DB;
use Session;
use Exception;
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
            'welcomeSection' => Section::whereType('welcome-section')->first(),
            'couponSection' => Section::whereType('coupon-section')->first(),
            'storySection' => Section::whereType('story-section')->first(),
        ]);
    }

    public function updateSection(Request $request)
    {
        $this->validate(request(), [
            'name'        => 'required|string',
            'description' => 'required|string',
            'services'    => 'required_if:type,welcome_section|array',
            'services.*'  => 'required|integer|exists:services,id,deleted_at,NULL',
        ]);
        DB::beginTransaction();
        try {
            $entity = Section::whereType($request->type)->firstOrFail();
            if ($entity) {
                $entity->update($request->all());
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

    // public function updatecouponSection(Request $request)
    // {
    //     switch ($request->type) {
    //         case 'welcome-section':
    //             $this->validate(request(), [
    //                 'name'        => 'required|string',
    //                 'description' => 'required|string',
    //                 'services'    => 'required|array',
    //                 'services.*'  => 'required|integer|exists:services,id,deleted_at,NULL',
    //             ]);
    //             DB::beginTransaction();
    //             try {
    //                 $entity = Section::whereType($request->type)->firstOrFail();
    //                 if ($entity) {
    //                     $entity->update($request->all());
    //                     Session::flash("success", " [ $request->type ] updated successfully");
    //                 } else {
    //                     Session::flash("danger", "failed to update record");
    //                 }
    //                 DB::commit();
    //             } catch (Exception $e) {
    //                 DB::rollback();
    //                 Session::flash("danger", $e->getMessage());
    //             }
    //             return redirect()->back();
    //             break;

    //         case 'welcome-section':
    //                 # code...
    //             break;
    //     }
    // }
}
