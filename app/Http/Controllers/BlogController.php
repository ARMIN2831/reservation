<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog()
    {
        $blogs = Blog::latest()->get();
        return view('admin.blog', compact('blogs'));
    }

    public function add_blog(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $imageName = null;
        if ($request->hasFile('image')) {
            $imageName = $this->uploadFile($validated['image']);
        }

        $validated['image'] = $imageName;

        Blog::create($validated);

        return redirect()->back()->with('success', 'پست با موفقیت اضافه شد.');
    }

    public function edit_blogs($id)
    {
        $blog = Blog::findOrFail($id);
        return view('admin.edit_blog', compact('blog'));
    }

    public function update_blog(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|exists:blogs,id',
            'title' => 'required|string|max:255',
            'content' => 'required',
            'image' => 'nullable|image|max:2048',
        ]);

        $blog = Blog::findOrFail($request->id);

        if ($request->hasFile('image')) {
            $oldImagePath = public_path('uploads/blogs/' . $blog->image);
            if ($blog->image && file_exists($oldImagePath)) {
                unlink($oldImagePath); // حذف با توابع خام PHP
            }

            $blog->image = $this->uploadFile($validated['image']);
        }

        $blog->title = $validated['title'];
        $blog->content = $validated['content'];
        $blog->save();

        return redirect()->back()->with('success', 'پست با موفقیت بروزرسانی شد.');
    }

    public function delete_blog($id)
    {
        $blog = Blog::findOrFail($id);

        $imagePath = public_path('uploads/blogs/' . $blog->image);
        if ($blog->image && file_exists($imagePath)) {
            unlink($imagePath); // حذف با unlink
        }

        $blog->delete();

        return redirect()->back()->with('success', 'پست با موفقیت حذف شد.');
    }
}
