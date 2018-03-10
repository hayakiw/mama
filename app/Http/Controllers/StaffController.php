<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;
use DB;
use App\Staff;

use App\Http\Requests\User as UserRequest;
use App\User;

class StaffController extends Controller
{

    public function show($id)
    {
        $staff = Staff::findOrFail($id);
        return view('user_staff.show')
            ->with([
            'staff' => $staff
        ]);
    }
}
