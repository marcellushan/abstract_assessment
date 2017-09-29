<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Assessor;

class AccessController extends Controller
{

    public function index( $username)
    {
        if($username == 'none') {
            $destination = 'https://intranet.highlands.edu/marctest/assessment_auth.php';
        } else {
            session(['username' => $username]);
            $assessor = Assessor::where('username', '=',  $username)->first();
            if(@$assessor->teams) {
                if(count($assessor->teams) > 0) {
                    $destination = 'dashboard/assessor/' . $assessor->id;
                } else {
                    $destination = 'access/no_team';
                }
            } else {
                $destination = 'access/not_auth';
            }
        }
        return redirect($destination);
    }

    public function notAuth ()
    {
        return view('dashboard.not_auth');
    }

    public function noTeam ()
    {
        return view('dashboard.no_team');
    }

}
