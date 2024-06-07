<?php

namespace App\Http\Controllers;
use App\Models\Project;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index() {

        $projects = Project::all();

        return view('guests.projects.index',compact ('projects'));
    }


    public function show(Project $project) {

        return view('guests.projects.show', compact('project'));
    }
}
