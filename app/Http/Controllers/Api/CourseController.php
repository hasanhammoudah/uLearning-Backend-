<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;

class CourseController extends Controller
{
    //course list
    public function courseList(){

       try {
        $result = Course::select('name', 'thumbnail', 'lesson_num', 'price', 'id')->get();

        return response()->json([
            'code' => 200,
            'msg' => 'My course list is here',
            'data' => $result
        ], 200);
       } catch (\Throwable $th) {
        return response()->json([
            'code' => 500,
            'msg' =>'The Column does not exist or you have a syntax error',
            'data' =>  $th->getMessage()
        ], 500);
       }
    }

    public function courseDetail(Request $request){
        $id=$request->id;

        try {
         $result = Course::where('id','=',$id)->select('name', 'downloadedable_res','description','user_token','price','video_length','lesson_num','thumbnail', 'lesson_num', 'price', 'id')->first();
 
         return response()->json([
             'code' => 200,
             'msg' => 'My course detail is here',
             'data' => $result
         ], 200);
        } catch (\Throwable $th) {
         return response()->json([
             'code' => 500,
             'msg' =>'The Column does not exist or you have a syntax error',
             'data' =>  $th->getMessage()
         ], 500);
        }
     }

     public function coursesBought(Request $request){
        $user = $request->user();
        $result = Course::join('orders', 'courses.id', '=', 'orders.course_id')->select('courses.name','courses.thumbnail', 'courses.lesson_num','courses.price','courses.id')->where('orders.status','=',1)->where('orders.user_token','=', $user->token)->get();
        try {
         return response()->json([
             'code' => 200,
             'msg' => 'The courses you bought',
             'data' => $result
         ], 200);
        } catch (\Throwable $th) {
         return response()->json([
             'code' => 500,
             'msg' =>'The Column does not exist or you have a syntax error',
             'data' =>  $th->getMessage()
         ], 500);
        }
     }
     public function orderList(Request $request){
        $user = $request->user();
        $result = Course::join('orders', 'courses.id', '=', 'orders.course_id')->select('courses.name','courses.thumbnail', 'courses.lesson_num','courses.price','courses.id','orders.status')->where('orders.user_token','=', $user->token)->get();
        try {
         return response()->json([
             'code' => 200,
             'msg' => 'My order list is here',
             'data' => $result
         ], 200);
        } catch (\Throwable $th) {
         return response()->json([
             'code' => 500,
             'msg' =>'The Column does not exist or you have a syntax error',
             'data' =>  $th->getMessage()
         ], 500);
        }
     }
}
