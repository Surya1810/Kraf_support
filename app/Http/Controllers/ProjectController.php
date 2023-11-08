<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $today = Carbon::now()->toFormattedDateString('d/m/y');
        // $projects = Project::where('deadline', '>=', today())->get();
        $projects = Project::where('status', '!=', 'Finished')->orWhere('deadline', '>=', today())->get();

        return view('project.index', compact('projects', 'today'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user()->id == '1' || Auth::user()->id == '9') {
            $users = User::where('id', '!=', '1')->get();
            return view('project.create', compact('users'));
        } else {
            abort(404);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->id == '1' || Auth::user()->id == '9') {
            $request->validate([
                'name' => 'bail|required',
                'client' => 'bail|required',
                'creative_brief' => 'bail|required',
                'pic' => 'bail|required',
                'assisten' => 'bail|required',
                'status' => 'bail|required',
                'urgency' => 'bail|required',
                'deadline' => 'bail|required',
                'start' => 'bail|required',
            ]);

            $old = session()->getOldInput();

            $project = new Project();
            $project->name = $request->name;
            $project->client = $request->client;
            $project->kode = (Str::random(5));
            $project->creative_brief = $request->creative_brief;
            $project->pic = $request->pic;
            $project->status = $request->status;
            $project->urgency = $request->urgency;
            $project->deadline = $request->deadline;
            $project->start = $request->start;
            $project->assisten = implode(',', $request->assisten);
            $project->save();

            return redirect()->route('project.index')->with(['pesan' => 'Project created successfully', 'level-alert' => 'alert-success']);
        } else {
            abort(404);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($kode)
    {
        if (Auth::user()->id == '1' || Auth::user()->id == '9') {
            $project = Project::where('kode', $kode)->first();
            $users = User::where('id', '!=', '1')->get();

            return view('project.edit', compact('project', 'users'));
        } else {
            abort(404);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if (Auth::user()->id == '1' || Auth::user()->id == '9') {
            $request->validate([
                'name' => 'bail|required',
                'client' => 'bail|required',
                'creative_brief' => 'bail|required',
                'pic' => 'bail|required',
                'assisten' => 'bail|required',
                'status' => 'bail|required',
                'urgency' => 'bail|required',
                'deadline' => 'bail|required',
                'start' => 'bail|required',
            ]);

            $project = Project::find($id);
            $project->name = $request->name;
            $project->client = $request->client;
            $project->creative_brief = $request->creative_brief;
            $project->pic = $request->pic;
            $project->status = $request->status;
            $project->urgency = $request->urgency;
            $project->deadline = $request->deadline;
            $project->start = $request->start;
            $project->assisten = implode(',', $request->assisten);
            $project->update();

            return redirect()->route('project.index')->with(['pesan' => 'Project updated successfully', 'level-alert' => 'alert-warning']);
        } else {
            abort(404);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if (Auth::user()->id == '1' || Auth::user()->id == '9') {
            $project = Project::find($id);

            $project->delete();

            return redirect()->route('project.index')->with(['pesan' => 'Project deleted successfully', 'level-alert' => 'alert-danger']);
        } else {
            abort(404);
        }
    }

    public function detail($kode)
    {
        $project = Project::where('kode', $kode)->first();

        $asisten = explode(',', $project->assisten);

        $pic = User::where('id', $project->pic)->first();
        $team = User::whereIn('id', $asisten)->get();

        return view('project.detail', compact('project', 'pic', 'team'));
    }

    public function task($kode)
    {
        $project = Project::where('kode', $kode)->first();

        if ($project->status != 'Finished') {
            // find team
            $asisten = explode(',', $project->assisten);
            $team = User::whereIn('id', $asisten)->pluck('id');
            // find pic
            $pic = User::where('id', $project->pic)->pluck('id');
            $pic_1 = explode(',', $pic);
            // find admin
            $admin = [1, 9];

            $access = $pic->merge($team)->merge($admin);

            // Task
            $tasks = $project->tasks;
            // dd($tasks);

            return view('project.task', compact('project', 'access', 'tasks'));
        } else {
            abort(404);
        }
    }

    public function review($kode)
    {
        $project = Project::where('kode', $kode)->first();

        return view('project.review', compact('project'));
    }

    public function done(Request $request, $id)
    {
        if (Auth::user()->id == '1' || Auth::user()->id == '9') {
            $request->validate([
                'review' => 'bail|required',
            ]);
            $project = Project::find($id);

            $project->status = 'Finished';
            $project->review = $request->review;
            $project->save();

            return redirect()->route('project.index')->with(['pesan' => 'Project Finished', 'level-alert' => 'alert-success']);
        } else {
            abort(404);
        }
    }
}
