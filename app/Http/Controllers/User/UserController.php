<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Document;
use App\Models\Lesson;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserUpdateRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        return view('user.home');
    }

    public function profile()
    {
        $id = Auth()->user()->id;
        $courses = Course::whereHas('users', function ($query) use ($id) {
            $query->where('user_id', $id);
        })->get();

        return view('user.profile', compact('courses'));
    }

    public function update(UserUpdateRequest $request)
    {
        $validatedData = $request->validated();
        $id = Auth()->user()->id;
        $user = User::find($id);
        if ($validatedData) {
            if ($request['username'] != null) {
                    $user->name = $request['username'];
            }
        
            if ($request['email'] != null) {
                $user->email = $request['email'];
            }
    
            if ($request['phone'] != null) {
                $user->phone = $request['phone'];
            }
    
            if ($request['address'] != null) {
                $user->address = $request['address'];
            }
    
            if ($request['birthday'] != null) {
                $user->birthday = $request['birthday'];
            }
    
            if ($request['desc'] != null) {
                $user->desc = $request['desc'];
            }
        }
        $user->save();
        Alert::success('Success', 'Update Success');
        return redirect()->back();
    }

    public function updateImg(Request $request)
    {
        $file = $request->file('file');
        $type = $file->getClientOriginalExtension();
        $name = time() . '.' .$type;
        $file->move('images/', $name);
        $id = Auth()->user()->id;
        $user = User::find($id);
        $user->avatar = $name;
        $user->save();
        return response()->json(true);
    }

    public function storeDocument(Request $request)
    {
        $userId = Auth()->user()->id;
        $documentId = $request->id;
        $user = User::find($userId);
        $checkexits = User::withCount(['documents as row' => function ($query) use ($documentId) {
            $query->where('document_id', $documentId);
        }])->find($userId);
        if ($checkexits->row == 0) {
            $document = Document::find($request->id);
            $user->documents()->attach($document);
            return response()->json(true);
        }
        return response()->json(false);
    }

    public function statusDocument(Request $request)
    {
        $userId = Auth()->user()->id;
        $lessonId = $request->lessonID;
        $status = User::with(['documents' => function ($query) use ($lessonId) {
            $query->with('lessons')->where('lesson_id', $lessonId);
        }])->find($userId);

        return response()->json($status);
    }
}
