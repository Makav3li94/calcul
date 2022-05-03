<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\BlogCategory;
use App\Traits\Date;
use Carbon\Carbon;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class AdminBlogController extends Controller
{
    use Date;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::all();
        return view('super-admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = BlogCategory::all()->pluck('name', 'id');
        return view('super-admin.blog.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'slug' => 'required|string|unique:blogs',
            'body' => 'required|string',
            'excerpt' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|numeric',
        ]);
        if (isset($request->published_at)) {
            $published_at = $this->convertNumbers($request->published_at);
            $published_at = explode('/', $published_at);
            $published_at = Verta::getGregorian($published_at[0], $published_at[1], $published_at[2]);
            $published_at = $published_at[0] . "-" . $published_at[1] . "-" . $published_at[2];
            if (isset($request->publish_time)) {
                if (strlen($request->publish_time) == 5) {
                    $published_at .= " " . $request->publish_time . ":00";
                } else {
                    $published_at .= " " . $request->publish_time;
                }

            }
            $published_at = Carbon::createFromFormat('Y-m-d H:i:s', $published_at)->toDateTimeString();
        } else {

            $published_at = Carbon::now()->toDateTimeString();
        }
        $path = '/uploads/files/blogs/';
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image = $this->FileUploader($image, $path);
        }


        Blog::create([
            'title' => $request->title,
            'slug' => Str::slug($request->slug),
            'body' => $request->body,
            'excerpt' => $request->excerpt,
            'image' => $image,
            'category_id' => $request->category_id,
//            'published_at' => $published_at,
        ]);


        return redirect()->back()->with('success', 'بلاگ با موفقیت ثبت شد.');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $blog = Blog::find($id);
        $categories = BlogCategory::all()->pluck('name', 'id');
        return view('super-admin.blog.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        $request->validate([
            'title' => 'required|string',
            'slug' => 'nullable|string||unique:blogs,slug,' . $blog->id,
            'body' => 'required|string',
            'excerpt' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'category_id' => 'required|numeric',
        ]);

        if (isset($request->published_at)) {

            $published_at = $this->convertNumbers($request->published_at);
            $published_at = explode('/', $published_at);
            $published_at = Verta::getGregorian($published_at[0], $published_at[1], $published_at[2]);
            $published_at = $published_at[0] . "-" . $published_at[1] . "-" . $published_at[2];
            if (isset($request->publish_time)) {
                if (strlen($request->publish_time) == 5) {
                    $published_at .= " " . $request->publish_time . ":00";
                } else {
                    $published_at .= " " . $request->publish_time;
                }
            }
            $published_at = Carbon::createFromFormat('Y-m-d H:i:s', $published_at)->toDateTimeString();

        }

        $path = '/uploads/files/blogs/';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image = $this->FileUploader($image, $path);
            File::delete(public_path($blog->image));

            $blog->update([
                'title' => $request->title,
                'slug' => Str::slug($request->slug),
                'body' => $request->body,
                'excerpt' => $request->excerpt,
                'image' => $image,
                'category_id' => $request->category_id,
            ]);
        } else {
            $blog->update([
                'title' => $request->title,
                'slug' => Str::slug($request->slug),
                'body' => $request->body,
                'excerpt' => $request->excerpt,
                'category_id' => $request->category_id,
            ]);
        }


        return redirect()->back()->with('success', 'با موفقیت بروزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    protected function FileUploader($file, $path)
    {
        $date = Verta::instance()->formatDate();
        $fileName = $file->getClientOriginalName();
        $fileNewName = time() . '-' . $date . '-' . $fileName;
        $file->move(public_path($path), $fileNewName);

        return $path . $fileNewName;
    }
}
