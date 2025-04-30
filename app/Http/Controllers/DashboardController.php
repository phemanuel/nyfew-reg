<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DashboardController extends Controller
{
    //
    public function userDashboard()
    {
        $user = auth()->user();

        // Fetch the application records for each stage
        $application = Application::where('user_id', $user->id)->get();
        $stage1 = Application::where('stage', 1)->paginate(10);

        $stage1Count = Application::where('stage', 1)->count();
        $stage2Count = Application::where('stage', 2)->count();
        $stage3Count = Application::where('stage', 3)->count();
        $stage4Count = Application::where('stage', 4)->count();

        // Retrieve the stages and statuses for each stage
        $stageStatuses = [
            1 => $application->where('stage', 1)->first(),
            2 => $application->where('stage', 2)->first(),
            3 => $application->where('stage', 3)->first(),
            4 => $application->where('stage', 4)->first(),
        ];

        return view('layout.user-dashboard', compact('stageStatuses','application','stage1',
         'stage1Count', 'stage2Count', 'stage3Count', 'stage4Count'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('layout.stage1',compact('user'));
    }    

    public function updateStage1(Request $request)
    {
        // Validate the incoming data
        $validatedData = $request->validate([
            'surname'     => 'required|string|max:255',
            'first_name'  => 'required|string|max:255',
            'other_name'  => 'required|string|max:255',
            'mobile_no'   => 'required|string|max:20',
            'mobile_no1'  => 'required|string|max:20',
            'gender'      => 'required|in:male,female',
            'dob'         => 'required|date',
            'address'     => 'required|string|max:255',
            'occupation'  => 'required|string|max:255',
            'instagram'   => 'nullable|string|max:255',
            'facebook'    => 'nullable|string|max:255',
            'snapchat'    => 'nullable|string|max:255',
            'twitter'     => 'nullable|string|max:255',
            'interest'    => 'required|string|max:255',
            'qst1'        => 'required|in:BEGINNER,PROFESSIONAL',
            'qst2'        => 'required|in:YES,NO',
            'ifyesqst2'   => 'nullable|string|max:255',
            // 'qst3'        => 'required|in:YES,NO',
            'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = Auth::user();

        // Handle file upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($user->image && file_exists(public_path('uploads/' . $user->image))) {
                unlink(public_path('uploads/' . $user->image));
            }
        
            // Generate a unique name for the new image
            $imageName = time() . '.' . $request->image->extension();
        
            // Move the image to the 'public/uploads' directory
            $request->image->move(public_path('uploads'), $imageName);
        
            // Update the user's image field with the new image name
            $user->image = $imageName;
        }

        // Update user details
        $user->surname     = $validatedData['surname'];
        $user->first_name  = $validatedData['first_name'];
        $user->other_name  = $validatedData['other_name'];
        $user->mobile_no   = $validatedData['mobile_no'];
        $user->mobile_no1  = $validatedData['mobile_no1'];
        $user->gender      = $validatedData['gender'];
        $user->dob         = $validatedData['dob'];
        $user->address     = $validatedData['address'];
        $user->occupation  = $validatedData['occupation'];
        $user->instagram   = $validatedData['instagram'];
        $user->facebook    = $validatedData['facebook'];
        $user->snapchat    = $validatedData['snapchat'];
        $user->twitter     = $validatedData['twitter'];
        $user->interest    = $validatedData['interest'];
        $user->qst1        = $validatedData['qst1'];
        $user->qst2        = $validatedData['qst2'];
        $user->if_yes_qst2   = $validatedData['ifyesqst2'];
        // $user->qst3        = $validatedData['qst3'];     
        $user->current_stage = 2;   

        $user->save();        

        // Fetch the application records for each stage
        $application = Application::where('user_id', $user->id)
        ->where('stage',1)
        ->first();

        $application->status = 'Approved';
        $application->comment = 'Stage 1 Completed.';

        $application->save();

        return redirect()->route('user-dashboard')->with('success', 'Stage 1 updated successfully!');
    }
    
    public function stage2Edit()
    
    {
        return redirect()->back()->with('error', 'You cannot access stage 2, as the selection process has not started.');
    }

    public function fetchStageData($stage)
    {
        // Fetch users based on selected stage
        $stage1 = \App\Models\Application::with('user')
            ->where('stage', $stage)
            ->get();

        // Render the table as HTML and return as a response
        $html = view('partials.stage-table', compact('stage1'))->render();

        return response()->json(['html' => $html]);
    }

    
}
