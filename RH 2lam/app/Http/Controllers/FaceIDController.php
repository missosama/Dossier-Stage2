<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\face_id_data;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use OpenCV;


use Symfony\Component\HttpFoundation\Response;
use OpenCV\FaceDetection;
use OpenCV\FaceRecognition;
use OpenCV\Image;

class FaceIDController extends Controller
{
    public function index(){
        return view('admin.registerFaceId');
    }
    public function submit(Request $request){

         $user_id = Auth::id();


         $image = $request->input('image');
         $base64_image = str_replace('data:image/png;base64,', '', $image);
         $decoded_image = base64_decode($base64_image);


         $filename = Str::random(40) . '.png';


         $image_path = 'faces/' . $filename;
         Storage::disk('public')->put($image_path, $decoded_image);


         $faceData = new face_id_data;
         $faceData->user_id = $user_id;
         $faceData->face_data = $image_path;
         $faceData->save();
         flash()->success('Success','FaceID Record has been created successfully !');
         return redirect()->route('admin')->with('success', 'Candidate status updated successfully.');
         ;

    }
    public function login(Request $request){

        $image = $request->input('image');
        $base64_image = str_replace('data:image/png;base64,', '', $image);
        $decoded_image = base64_decode($base64_image);
        $stored_face = face_id_data::where('user_id', 1)->first();
        if (!$stored_face) {

            return redirect()->back()->with('error', 'No stored face ID found');
        }
    $captured_face_image = Image::make($decoded_image);
    $stored_face_image = Image::make(Storage::disk('public')->get($stored_face->face_data));
    $face_detector = new FaceDetection();
    $face_recognizer = new FaceRecognition();

    $captured_face_descriptor = $face_recognizer->getFaceDescriptor($captured_face_image, $face_detector);
    $stored_face_descriptor = $face_recognizer->getFaceDescriptor($stored_face_image, $face_detector);
    $distance = $face_recognizer->getFaceDistance($captured_face_descriptor, $stored_face_descriptor);


    $threshold = 0.5;

    if ($distance <= $threshold) {

        Auth::loginUsingId(Auth::id());
        return redirect()->route('admin')->with('success', 'Face authentication successful');
    } else {

        return redirect()->back()->with('error', 'Face authentication failed');
    }
    }
}
