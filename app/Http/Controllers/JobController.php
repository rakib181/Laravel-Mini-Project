<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Employer;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index()
    {
        $jobs = Job::with('employer')->latest()->paginate(5);
        return view('jobs.index', ['jobs' => $jobs]);
    }
    public function create(){
        $employers = Employer::all();
        return view('jobs.create', ['employers' => $employers]);
    }
    public function store(Request $request){
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'salary' => 'required',
        ]);

        $job = Job::query()->create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'salary' => $request->get('salary'),
            'employer_id' => $request->get('employer_id'),
        ]);
        Mail::to($job->employer->user)->queue(new JobPosted($job));
        return redirect()->route('jobs.index');
    }
    public function show(Job $job){
        return view('jobs.show', ['job' => $job]);
    }
    public function edit(Job $job){
        if(Auth::guest() || Auth::user()->cannot('edit', $job)){
            abort(403);
        }
        return view('jobs.edit', ['job' => $job, 'employers' => Employer::all()]);
    }
    public function update(Request $request, Job $job): RedirectResponse
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|min:10',
            'salary' => 'required',
        ]);
        $job->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'salary' => $request->get('salary'),
            'employer_id' => $request->get('employer_id'),
        ]);
        return redirect()->route('jobs.edit', ['job' => $job]);
    }
    public function destroy(Job $job): RedirectResponse
    {
        $job->delete();
        return redirect()->route('jobs.index');
    }
}
