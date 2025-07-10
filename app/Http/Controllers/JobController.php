<?php

namespace App\Http\Controllers;

use App\Http\Requests\JobRequest;
use App\Models\Job;
use App\Models\Employer;
use App\Models\Tag;
use App\Policies\JobPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jobs = Job::with('tags')->orderBy('featured', 'desc')->get()->groupBy('featured');


        $featuredJobs = $jobs->has('1') ? $jobs['1'] : collect();
        $regularJobs = $jobs->has('0') ? $jobs['0'] : collect();

        // if (Auth::check()) {
        //     dd(Auth::user()->avatar);
        // } else {
        //     dd("user is not authanticated");
        // }

        return view('jobs.index', [
            'featuredJobs' => $featuredJobs,
            'regularJobs' => $regularJobs,
            'tags' => Tag::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view("jobs.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(JobRequest $request)
    {

        // Get the tags from the request
        $tags = json_decode($request->input('tags'), true);
        $tagIds = [];

        // Create tags if they don't exist or get the existing IDs
        foreach ($tags as $tagName) {
            $tag = Tag::firstOrCreate(['name' => $tagName]);
            $tagIds[] = $tag->id;
        }

        // Check if the user is an employer or create a new one

        $employer = Employer::where('user_id', Auth::id())->first();
        if (!$employer) {
            $employer = Employer::create([
                'user_id' => Auth::id(),
                'name' => Auth::user()->name,
                'logo' => Auth::user()->avatar,
            ]);
        }

        // Validate the input data
        $validatedData = $request->validated();

        // Add employer ID to the validated data
        $validatedData["employer_id"] = $employer->id;

        // Upload and store the image
        $validatedData['avatar'] = $this->uploadAvatar($request, $job->avatar ?? null);

        // Create the job
        $job = Job::create($validatedData);

        // Link the tags to the job using Many-to-Many relationship
        $job->tags()->sync($tagIds);

        // Redirect to the jobs index page
        return redirect()->route('jobs.index');
    }



    /**
     * Display the specified resource.
     */
    public function show(Job $job)
    {
        //
        $employer = $job->employer;

        return view("jobs.show", ["job" => $job, "employer" => $employer]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Job $job)
    {
        //

        $tags = $job->tags;



        return view("jobs.edit", ["job" => $job, "tags" => $tags]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(JobRequest $request, Job $job)
    {
        // Get the tags from the request
        $tags = json_decode($request->input('tags'), true);
        $tagIds = [];

        if (is_array($tags)) {
            foreach ($tags as $tag) {
                if (isset($tag['id']) && isset($tag['name'])) {
                    Tag::where("id", $tag['id'])->update(["name" => $tag['name']]);
                    $tagIds[] = $tag['id'];
                }
            }
        }

        // Check if the user is an employer or create a new one
        $employer = Employer::firstOrCreate(
            ['user_id' => Auth::id()],
            [
                'name' => Auth::user()->name,
                'logo' => Auth::user()->avatar,
            ]
        );

        // Validate the input data
        $validatedData = $request->validated();


        // Add employer ID to the validated data
        $validatedData["employer_id"] = $employer->id;

        // Upload and store the image
        $validatedData['avatar'] = $this->uploadAvatar($request, $job->avatar ?? null);


        // Update the job
        $job->update($validatedData);

        // Link the tags to the job using Many-to-Many relationship
        $job->tags()->sync($tagIds);

        // Redirect to the jobs index page

        return redirect()->route('jobs.show', $job->id)->with('success', 'Job added successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Job $job)
    {
        //
        $job->delete();
        Storage::disk('public')->delete('posts/' . $job->avatar);

        return redirect()->route('jobs.index')->with('success', 'Job deleted successfully.');
    }
    public function search(Request $request)
    {
        //
        $query = $request->input("query");

        if (!$query) {
            return redirect()->route('jobs.index')->with('error', 'يجب إدخال كلمة للبحث.');
        }

        $jobs = Job::where("title", "LIKE", "%$query%")->orWhereHas("tags", function ($q) use ($query) {
            $q->where('name', 'LIKE', "%{$query}%");
        })->with('tags')->get();



        return view('jobs.search', compact('jobs', 'query'));
    }



    private function uploadAvatar(Request $request, $currentAvatar = null)
    {
        if ($request->hasFile('avatar')) {
            if ($currentAvatar) {
                Storage::disk('public')->delete('posts/' . $currentAvatar);
            }
            $imageName = time() . '.' . $request->avatar->extension();
            $request->avatar->storeAs('posts', $imageName, 'public');
            return $imageName;
        }
        return $currentAvatar;
    }
}
