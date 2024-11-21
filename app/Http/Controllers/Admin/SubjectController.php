<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $subjects = Subject::all()->load("users");;
        $users = User::all();
        // $subject_users = Subject::with("users")->get();
        // $subject_users = $subjects->load("users");

        // dd($subject_users[0]->users[0]);
        return Inertia::render("Admin/Subject",["subjects"=>$subjects,"users"=>$users]);
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
        Subject::create($request->all());
        return to_route('subject.index');

    }


    public function update(Request $request, Subject $subject)
    {
        //
        $subject->update(
            $request->all()
        );
        $subject->save();
        return to_route('subject.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        //
        $subject->delete();
        return to_route('subject.index');

    }
}
