<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('project.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $users = User::where('id', '!=', '1')->get();
        return view('project.create', compact('users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->assisten);
        $request->validate([
            'name' => 'bail|required',
            'client' => 'bail|required',
        ]);

        $old = session()->getOldInput();

        $project = new Project();
        $project->name = $request->name;
        $project->client = $request->client;
        $project->kode = Str::random(5);
        $project->creative_brief = $request->creative_brief;
        $project->pic = $request->pic;
        $project->status = $request->status;
        $project->urgency = $request->urgency;
        $project->assisten = implode(',', $request->assisten);;
        $project->save();

        return redirect()->route('project.index')->with(['pesan' => 'Project created successfully', 'level-alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('project.view');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        return view('project.edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        // 
    }

    public function detail($kode)
    {
        $project = Project::where('kode', $kode)->first();

        return view('project.detail', compact('project'));
    }

    public function task(Project $project)
    {
        //
    }

    public function review(Project $project)
    {
        //
    }
}
