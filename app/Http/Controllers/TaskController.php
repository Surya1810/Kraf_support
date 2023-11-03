<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => 'bail|required',
            'desc' => 'bail|required',
            'attachment' => 'bail|required',
        ]);

        $old = session()->getOldInput();

        $project = new Task();
        $project->project_id = $id;
        $project->title = $request->title;
        $project->desc = $request->desc;
        $project->attachment = $request->attachment;
        $project->by = Auth::user()->name;
        $project->order = '1';
        $project->save();

        return redirect()->back()->with(['pesan' => 'Task created successfully', 'level-alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        $task->delete();

        return redirect()->back()->with(['pesan' => 'Project deleted successfully', 'level-alert' => 'alert-danger']);
    }

    public function status($id)
    {
        $task = Task::find($id);

        if ($task->status === 'Done') {
            $task->by = Auth::user()->name;
            $task->status = 'Undone';
            $task->update();
        } else {
            $task->by = Auth::user()->name;
            $task->status = 'Done';
            $task->update();
        }

        return redirect()->back()->with(['pesan' => 'Task created successfully', 'level-alert' => 'alert-success']);
    }
}
