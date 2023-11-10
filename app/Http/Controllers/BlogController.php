<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::all();
        $published = Blog::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->where('status', true)->count();
        $unpublished = Blog::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->where('status', false)->count();
        $month = Blog::whereYear('created_at', Carbon::now()->year)->whereMonth('created_at', Carbon::now()->month)->count();

        return view('blog.index', compact('blogs', 'published', 'unpublished', 'month'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|unique:blogs,title',
            'thumbnail' => 'required',
            'categories' => 'required',
            'tags' => 'required',
            'body' => 'required',
        ]);
        $image = $request->file('thumbnail');
        $slug = Str::slug($request->title);

        // Image
        if (isset($image)) {
            $currentDate = Carbon::now()->toDateString();
            $imageName  = $slug . '-' . $currentDate . '-' . uniqid() . '.' . $image->getClientOriginalExtension();

            if (!Storage::disk('public')->exists('post')) {
                Storage::disk('public')->makeDirectory('post');
            }

            $postImage = Image::make($image)->encode('webp', 90)->crop(500, 500, 25, 25);
            Storage::disk('public')->put('post/' . $imageName . '.webp', $postImage);
        } else {
            $imageName = "default.png";
        }

        // Content
        $post = new Blog();
        $post->user_id = Auth::id();
        $post->title = $request->title;
        $post->slug = $slug;
        $post->image = $imageName;
        $post->body = $request->body;
        $post->category = $request->categories;
        $post->tag = implode(',', $request->tags);;
        $post->save();

        return redirect()->route('blog.index')->with(['pesan' => 'Project created successfully', 'level-alert' => 'alert-success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $post = Blog::find($id);

        return view('blog.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $task = Blog::find($id);
        $task->delete();

        return redirect()->back()->with(['pesan' => 'Post deleted successfully', 'level-alert' => 'alert-danger']);
    }

    public function status($id)
    {
        $task = Blog::find($id);

        if ($task->status === true) {
            $task->status = false;
            $task->update();
            return redirect()->back()->with(['pesan' => 'Post pending', 'level-alert' => 'alert-warning']);
        } else {
            $task->status = true;
            $task->update();
            return redirect()->back()->with(['pesan' => 'Post published', 'level-alert' => 'alert-success']);
        }
    }
}
