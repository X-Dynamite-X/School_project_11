<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SubjectUser;
use Illuminate\Http\Request;
use \Inertia\Inertia;
class SubjectUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subject_users = SubjectUser::all();
        return Inertia::render("Admin/SubjectUser",["subject_users"=>$subject_users]);

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
    }

    /**
     * Display the specified resource.
     */
    public function show(SubjectUser $subjectUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SubjectUser $subjectUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SubjectUser $subjectUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SubjectUser $subjectUser)
    {
        //
    }
}
