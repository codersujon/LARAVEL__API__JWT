<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;

class CourseController extends Controller
{
    /**
     * Course Enrollment (POST, formdata)
     */
    public function courseEnroll(Request $request){

        // Validation
        $request->validate([
            "title" => "required",
            "description" => "required",
            "total_videos" => "required",
        ]);

        $userID = auth()->user()->id;

        // Course Model
        Course::create([
            "user_id" => $userID,
            "title" => $request->title,
            "description" => $request->description,
            "total_videos" => $request->total_videos,
        ]);

        // Response
        return response()->json([
            "status"=> true,
            "message"=> "Course Saved Successfully!"
        ]);
    }


    /**
     * List Course API by user id (GET)
     */
    public function listCourse(){
        $userID = auth()->user()->id;
        $courses = User::find($userID)->courses;

        if(!empty($courses)){
            return response()->json([
                "status"=> true,
                "message"=> "Courses Found",
                "data"=>$courses
            ]);
        }

         // Response
         return response()->json([
            "status"=> false,
            "message"=> "No Course Found!"
        ]);

    }

    /**
     * Delete User Course
     */
    public function deleteCourse($course_id){

    }
}
