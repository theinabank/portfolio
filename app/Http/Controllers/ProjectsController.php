<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Category;
use App\Models\Image;
use Illuminate\Http\Request;

class ProjectsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        $projects = Project::where('status', '=', 'public')->latest()->take(3)->get();

        return view("welcome", ['projects' => $projects]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function projectIndex()
    {
        $projects = Project::where('status', '=', 'public')->orderBy('id', 'DESC')->get();

        return view("project.index", ['projects' => $projects]);
    }

    /**
     * Display categories.
     * 
     * @return \Illuminate\Http\Response
     */

    public function category(int $id)
    {
        $category = Category::with('projects')->find($id);

        if (!$category) {
            return abort(404);
        }

        $projects = $category->projects->filter(function(Project $project){
            return $project->status === 'public';
        })->sortByDesc('id');


        return view("project.index", ['projects' => $projects]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Project  $project
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $project = Project::find($id);

        if (!$project) {
            return abort(404);
        }

        $images = Image::where('project_id', '=' , $id)->get();

        return view('project.show', ['project' => $project, 'images' => $images]);
    }
}
