<?php

namespace App\Http\Controllers;
use PDF;
use App\Models\Resume;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Notifications\SendEmail;
use Illuminate\Support\Facades\Session;

class ResumeController extends Controller
{
    public function index(Request $request)
    {

        $resume = '';
        return view('frontend.resume.index', compact('resume'));
    }
    public function create()
    {
    }

    public function store(Request $request)
    {
        if ($request->id && $request->input('id') != 0 && Resume::findOrFail($request->input('id'))) {
            $validator = Validator::make($request->all(), [
                'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048' . $request->input('id'),
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email|unique:resumes,email,' . $request->input('id'),
                'address' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'nationality' => 'required',
                'language' => 'required',
            ]);
            }else{
            $validator = Validator::make($request->all(), [
                'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|email',
                'address' => 'required',
                'dob' => 'required',
                'gender' => 'required',
                'nationality' => 'required',
                'language' => 'required',
            ]);
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator->errors());
            }
        }
        if ($request->hasfile('photo')) {
            $img = $request->file('photo');
            $upload_path = public_path() . '/upload/profile/';
            $file = $img->getClientOriginalName();
            $name = $request->input('name') . $file;
            $img->move($upload_path, $name);
            $path = '/upload/profile/' . $name;
        } else {
            $path = "/assets/images/default-user.png";
        }
        if($request->id && $request->input('id') != 0 && Resume::findOrFail($request->input('id'))){
            $resumeData = Resume::find($request->input('id'));
            $resumeData->update([
                'name' => $request->input('name'),
                'nickname' => $request->input('nickname'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'dob' => $request->input('dob'),
                'line' => $request->input('line'),
                'gender' => $request->input('gender'),
                'address' => $request->input('address'),
                'nationality' => $request->input('nationality'),
                'language' => $request->input('language'),
                'description' => $request->input('description'),
                'school' => $request->input('school'),
                'degree' => $request->input('degree'),
                'major' => $request->input('major'),
                'gpa' => $request->input('gpa'),
                'hobby' => $request->input('hobby'),
                'finish_date' => $request->input('finish_date'),
                'company' => $request->input('company'),
                'position' => $request->input('position'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'worked_address' => $request->input('worked_address'),
                'photo' => $path,
            ]);
            $data = Resume::find($request->input('id'));
        } else {
            $data = Resume::create([
                'name' => $request->input('name'),
                'nickname' => $request->input('nickname'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'dob' => $request->input('dob'),
                'line' => $request->input('line'),
                'gender' => $request->input('gender'),
                'address' => $request->input('address'),
                'nationality' => $request->input('nationality'),
                'language' => $request->input('language'),
                'description' => $request->input('description'),
                'school' => $request->input('school'),
                'degree' => $request->input('degree'),
                'major' => $request->input('major'),
                'gpa' => $request->input('gpa'),
                'hobby' => $request->input('hobby'),
                'finish_date' => $request->input('finish_date'),
                'company' => $request->input('company'),
                'position' => $request->input('position'),
                'start_date' => $request->input('start_date'),
                'end_date' => $request->input('end_date'),
                'worked_address' => $request->input('worked_address'),
                'photo' => $path,
            ]);
        }
        if ($data) {
            $data = Resume::find($data->id);
            Session::forget('data');
            Session::put('data' , $data);
            return redirect()->route('resume.index')->with([
                'success' => 'Resume created successfully!',
                'showModal' => true,
                'data' => $data
            ]);
        } else {
            return redirect()->back()->with('error', 'Failed to create resume.');
        }
    }
    public function storeShort(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'photo' => 'required',
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'address' => 'required',
            'dob' => 'required',
            'gender' => 'required',
            'nationality' => 'required',
            'language' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator->errors());
        }

        $path = $request->hasFile('photo')
            ? '/upload/profile/' . $request->file('photo')->getClientOriginalName()
            : "/assets/images/default-user.png";

        $data = Resume::updateOrCreate(['id' => $request->id], array_merge($request->except('photo'), ['photo' => $path]));

        if ($data) {
            Session::forget('data');
            Session::put('data', Resume::find($data->id));
            return redirect()->route('resume.index')->with([
                'success' => 'Resume created successfully!',
                'showModal' => true,
                'data' => $data
            ]);
        } else {
            return redirect()->back()->with('error', 'Failed to create resume.');
        }
    }

    public function show($id)
    {
    }
    public function edit($slug){
        $resume = Resume::where('slug', $slug)->first();
        if($resume) {
            return view('frontend.resume.index', compact('resume'));
        }else{
            return response()->json("error", 200);
        }
    }
    public function resumedownload(Request $request,$slug)
    {
        //PLEEASE ADD HERE FOR PDF DOWNLOAD CODE
        $resume = Resume::where('slug', $slug)->first();
        $mailNotification = new SendEmail($resume->name, "Congratulations!", "Your Request Have Been Approved By Admin");
        $resume->notify($mailNotification);
        $mailNotification->setSentSuccessfully(true);
        if($mailNotification->sentSuccessfully){
            $logo = base64_encode($resume->photo);
            if($resume) {
                $pdf  = PDF::loadView('frontend.preview.pdf', compact('resume', 'logo'))
                    ->setPaper('A4')
                    ->setOptions([
                    'defaultFont' => 'Arial',
                    'isRemoteEnabled' => true,
                    'enable-local-file-access' => true,
                    'enable-javascript' => true,
                    'enable-smart-shrinking' => true,
                    'noImages' => true,
                    'margin-top' => 0,
                    'margin-right' => 0,
                    'margin-bottom' => 0,
                    'margin-left' => 0,
                    'page-size' => 'A4',
                ]);
                return $pdf->stream( $resume->name  . '.pdf');
            }else{
                return response()->json("error", 200);
            }
        }
    }
    public function update(Request $request, $id)
    {
    }
    public function destroy($id)
    {
    }
    public function download($id)
    {
    }
    public function preview($id)
    {
    }
    public function share($id)
    {
    }
    public function report($id)
    {
    }
    public function delete($id)
    {
    }
    public function archive($id)
    {
    }
    public function restore($id)
    {
    }
    public function duplicate($id)
    {
    }
    public function move($id)
    {
    }
    public function copy($id)
    {
    }
    public function rename($id)
    {
    }
    public function addTag($id)
    {
    }
    public function removeTag($id)
    {
    }
}
