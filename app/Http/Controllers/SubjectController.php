<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subjects = Subject::all();
        

        // return  $subjects;
        return Inertia::render("School/Subject",["subjects"=>$subjects]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $subject = new Subject();
        $subject->name = $request->input('name');
        $subject->success_mark = $request->input('success_mark');
        $subject->full_mark = $request->input("full_mark");
        $subject->save();
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        //
        return $subject;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
