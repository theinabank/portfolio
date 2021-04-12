<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Category;
use App\Models\Image;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # command for creating a role
        // php artisan permission:create-role admin
        # command for assigning a role (1st need to remove midddleware)
        // auth()->user()->assignRole('admin');

        $projects = Project::all();
        $count = Project::count();
        $hiddenCount = Project::where('status', '=', 'hidden')->count();

        return view("admin.main", ['projects' => $projects, 'count' => $count, 'hiddenCount' => $hiddenCount]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.add', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3|max:255|string',
            'thumbnail' => 'required',
            'intro' => 'required',
            'text' => 'required',
            'category' => 'required'
        ]);
        
        // get image name for thumbnail
        $image = $request->file('thumbnail');
        $imageName = $image->getClientOriginalName();
        // put image name in public folder 'images'
        $request->thumbnail->move(public_path('images'), $imageName);

        // create new project
        $project = new Project();
        
        // put data in project model
        $project->title = $request->title;
        $project->intro = $request->intro;
        $project->category_id = $request->category;
        $project->thumbnail = "images/" . $imageName;
        $project->text = $request->text;
        $project->status = $request->status ? 'public' : 'hidden';

        // save project in DB
        $project->save();

        // save images for gallery
        if ($request->hasfile('gallery')) {
            $images = $request->file('gallery');

            foreach($images as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path('images'), $name);

                Image::create([
                    'url' => 'images/'.$name,
                    'project_id' => $project->id
                  ]);
            }
         }

        return redirect()->route('admin-main')
            ->with('success', 'Project created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return abort(404);
        }

        $category = Category::with('projects')->find($id);
        $images = Image::where('project_id', '=' , $id)->get();

        return view('admin.show', ['project' => $project, 'images' => $images, 'category' => $category]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $categories = Category::all();
        $project = Project::where('id', $id)->firstOrFail();
        $images = Image::where('project_id', '=' , $id)->get();

        return view('admin.edit', ['categories' => $categories, 'project' => $project, 'images' => $images]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {   
        $project = Project::where('id', $id)->firstOrFail();
        $basePath = public_path() . 'images/';

        // thumbnail
        if ($request->file('thumbnail')) {
            //code for remove old file
            if($project->thumbnail !== ''  && $project->thumbnail !== null){
                $fileOld = $basePath . $project->thumbnail;
                try { // try to delete old thumbnail
                   unlink($fileOld);
                } catch (\Throwable $e) {
                    // ¯\_(ツ)_/¯
                }
            }
  
            
            $image = $request->file('thumbnail');
            $imageName = $image->getClientOriginalName();
            //upload new file in public folder
            $request->thumbnail->move(public_path('images'), $imageName);
       }

        $project->title = $request->title;
        $project->intro = $request->intro;
        $project->category_id = $request->category;
        $project->thumbnail = isset($imageName) ? "images/" . $imageName : $project->thumbnail;
        $project->text = $request->text;
        $project->status = $request->status ? 'public' : 'hidden';

        // update project
        $project->update();

        // gallery
        if ($request->hasfile('gallery')) {

            // delete all the other images
            $project->images->each(function (Image $image) {
                try { // try to delete old files
                    unlink(public_path() . $image->url);
                } catch (\Throwable $e) {
                    // ¯\_(ツ)_/¯
                }

                $image->delete();
            });

            $images = $request->file('gallery');

            // put new images
            foreach ($images as $image) {
                $name = $image->getClientOriginalName();
                $image->move(public_path('images'), $name);
                
                $projectImage = new Image();
                $projectImage->url = 'images/' . $name;
                $projectImage->project_id = $project->id;
                $projectImage->save();
            }
        }

        return redirect()->route('admin-main')
            ->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $project = Project::find($id);

        $basePath = public_path() . 'images/';

        $fileOld = $basePath . $project->thumbnail;
        try { // try to delete old thumbnail
           unlink($fileOld);
        } catch (\Throwable $e) {
            // ¯\_(ツ)_/¯
        }

        // delete all the other images
        $project->images->each(function (Image $image) {
            try { // try to delete old files
                unlink(public_path() . $image->url);
            } catch (\Throwable $e) {
                // ¯\_(ツ)_/¯
            }

            $image->delete();
        });

        $project->delete();


        return redirect()->route('admin-main')
            ->with('success', 'Project deleted successfully.');
    }
}
