<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Str;

class AdminPostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('admin.post_view', compact('posts'));
    }

    public function add()
    {
        return view('admin.post_add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'photo' => 'required|image|mimes:jpg,jpeg,png,gif',
            'heading' => 'required',
            'short_content' => 'required',
            'content' => 'required'
        ]);

        $ext = $request->file('photo')->extension();
        $final_name = time().'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);

        // Generate slug from heading
        $slug = Str::slug($request->heading);
        // Ensure slug is unique
        $existing = Post::where('slug', $slug)->count();
        if ($existing > 0) {
            $slug .= '-' . time();
        }

        $obj = new Post();
        $obj->photo = $final_name;
        $obj->title = $request->title;
        $obj->heading = $request->heading;
        $obj->slug = $slug;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;
        $obj->total_view = 1;
        $obj->save();

        return redirect()->back()->with('success', 'Post is added successfully.');
    }

    public function edit($id)
    {
        $post_data = Post::where('id', $id)->first();
        return view('admin.post_edit', compact('post_data'));
    }

    public function update(Request $request, $id)
    {
        $obj = Post::where('id', $id)->first();

        if ($request->hasFile('photo')) {
            $request->validate([
                'photo' => 'image|mimes:jpg,jpeg,png,gif'
            ]);

            if (file_exists(public_path('uploads/' . $obj->photo))) {
                unlink(public_path('uploads/' . $obj->photo));
            }

            $ext = $request->file('photo')->extension();
            $final_name = time().'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $obj->photo = $final_name;
        }

        $obj->heading = $request->heading;
        $obj->short_content = $request->short_content;
        $obj->content = $request->content;

        // Regenerate slug if heading changed
        $new_slug = Str::slug($request->heading);
        if ($new_slug !== $obj->slug) {
            $slug_check = Post::where('slug', $new_slug)->where('id', '!=', $id)->count();
            if ($slug_check > 0) {
                $new_slug .= '-' . time();
            }
            $obj->slug = $new_slug;
        }

        $obj->update();

        return redirect()->back()->with('success', 'Post is updated successfully.');
    }

    public function delete($id)
    {
        $single_data = Post::where('id', $id)->first();

        if (file_exists(public_path('uploads/' . $single_data->photo))) {
            unlink(public_path('uploads/' . $single_data->photo));
        }

        $single_data->delete();

        return redirect()->back()->with('success', 'Post is deleted successfully.');
    }
}
