<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{
    public function search(Request $request)
    {
        if ( $data =$request->get('data')) {
            $data = DB::table('jobs')->where('title', 'like', "%{$data}%")->get();
           // dd($data);
           $output = '<ul class="dropdown-menu" style="display:block; position:relative">';
           foreach ($data as $row) {
            $output .= ' <li><a href="#" class="col-md-6 mb-3 mb-md-0" style="color:green;">' . $row->title . '</a></li>';
        }
        $output .= '</ul>';
        echo $output;
        }
    }
}
