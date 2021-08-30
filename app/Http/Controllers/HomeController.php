<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Category;
use App\Models\Contact;
use App\Models\Job;
use App\Models\Question;
use App\Models\Service;
use App\Models\Team;
use App\Models\Testimony;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::select('id', 'name','icon', 'job_num')->get();
        $testimonies = Testimony::select('id', 'image', 'description', 'user_id')->get();
        $jobs = Job::select('id','title', 'type_id', 'image', 'salary', 'company_id','description')->get();
        $services = Service::select('id', 'name', 'icon', 'description')->get();

        return view('welcome', ['categories' => $categories,
                                 'testimonies'=> $testimonies,
                                 'jobs'=> $jobs,
                                 'services' => $services]);

    }

    public function getCategories()
    {
        $categories = Category::select('id', 'name','icon', 'job_num')->get();
        return view('categories', ['categories' => $categories]);
    }

    public function getTestimonies()
    {
        $testimonies = Testimony::select('id', 'image', 'description', 'user_id')->get();
        return view('testimonies', ['testimonies' => $testimonies]);

    }

    public function getJobs()
    {
        $jobs = Job::select('id','title', 'type_id', 'image', 'salary', 'company_id')->get();
        return view('jobs', ['jobs' => $jobs]);

    }

    public function getServices()
    {
        $services = Service::select('id', 'name', 'icon', 'description')->get();
        return view('services', ['services' => $services]);

    }

    public function getTeam()
    {
        $team = Team::select('id', 'name', 'image', 'job_title')->get();
        return view('team', ['teams' => $team]);
    }

    public function getQandA()
    {
        $questions = Question::select('id', 'question', 'answer')->where('status', '=', 'on')->get();
        return view('Q&A', ['questions' => $questions] );
    }

    public function getAbout()
    {
        $about = About::select('id','image', 'description', 'name', 'job_title')->get();
        return view('about', ['abouts' => $about]);
    }

    public function getSingleJob()
    {
        $singlejob = Job::select('id','title', 'type_id', 'image', 'type_id', 'company_id', 'description')->get();
        return view('job_single', ['job' => $singlejob]);
    }

    public function getNewJob()
    {
        $newjob = Job::select('id','title', 'type_id', 'salary', 'company_id', 'description');
        return view('new_job', ['new_job' => $newjob]);
    }

    public function getContact()
    {
        $contact = Contact::select('id', 'name', 'email', 'phone', 'message');
        return view('contact', ['contacts' => $contact]);
    }

}
