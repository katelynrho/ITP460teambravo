<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use App\Available_time;
use App\Tutor_request;

class tutorRequestController extends Controller
{
    public function showMakeTutorRequest(Request $request, User $tutor) {

        $user = Auth::user();
        if($user->is_tutor === 1 || $tutor->is_tutor === 0) {
            return redirect()->route('home');
        }

        $from = $request->input('from');
        $times = $tutor->available_times;
        $interestedCourses = $user->courses;
        $interestedSubjects = $user->subjects;

        return view('tutor_request.show_request_session', [
            "user" => $user,
            "tutor" => $tutor,
            "from" => $from,
            "times" => $times,
            "interestedCourses" => $interestedCourses,
            "interestedSubjects" => $interestedSubjects
        ]);
    }

    public function makeTutorRequest(Request $request) {
        $startTime = $request->input('start_time');
        $endTime = $request->input('end_time');
        $date = $request->input('tutor_session_date');
        $tutorId = $request->input('tutor_id');

        $tutorRequest = new Tutor_request();
        $tutorRequest->tutor_id = $tutorId;


    }


    public function showEditAvailability(Request $request) {
        $user = Auth::user();
        if($user->is_tutor === 0) {
            return redirect()->route('home');
        }

        $times = $user->available_times;


        $from = $request->input('from');
        return view('tutor_request.show_edit_availability', [
            "user" => $user,
            'from' => $from,
            'times' => $times
        ]);
    }

    public function saveAvailableTime(Request $request) {
        $startTime = $request->input('startTime');
        $endTime = $request->input('endTime');

        $availableTime = new Available_time();
        $availableTime->user_id = Auth::user()->id;
        $availableTime->available_time_start = $startTime;
        $availableTime->available_time_end = $endTime;
        $availableTime->save();

        return response()->json([
            'successMsg' => 'Successfully added this time slot to your available time!'
        ]);

    }

}
