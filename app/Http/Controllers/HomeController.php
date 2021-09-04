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
        return view('job_single');
    }

    public function getNewJob()
    {
        return view('new_job');
    }

    public function getContact()
    {
        return view('contact');
    }

}
