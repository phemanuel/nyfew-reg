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

        // Check if a stage 2 record already exists for the user
        $applicationExists = Application::where('user_id', $id)
            ->where('stage', 2)
            ->exists();

        // If not exists, create it
        if (!$applicationExists) {
            Application::create([
                'user_id' => $user->id,
                'status' => 'Not Approved',
                'comment' => 'Not Completed',
                'stage' => 2,
            ]);
        }

        return redirect()->route('user-dashboard')->with('success', 'Stage 1 updated successfully!');
    }
    
    public function stage2Edit($id)
    {
        $startDate = "2025-04-30";
        $dueDate = "2025-07-13";
        $currentDate = date('Y-m-d');

        if ($currentDate < $startDate) {
            return redirect()->back()->with('error', 'Entries for stage 2 have not commenced, check back.');
        } elseif ($currentDate > $dueDate) {
            return redirect()->back()->with('error', 'Registration Closed.');
        }

        $user = User::findOrFail($id);

        // Retrieve the stage 2 application if it exists
        $application = Application::where('user_id', $id)
            ->where('stage', 2)
            ->first();

        if ($application) {
            // Check the application status
            if ($application->status == 'Pending Review') {
                return redirect()->back()->with('error', 'Your video is still under review, you cannot upload yet.');
            } elseif ($application->status == 'Approved') {
                return redirect()->back()->with('error', 'Your video has been approved, you can only view or proceed to the next stage.');
            }

            // If status is Not Approved or Reviewed, allow access to stage 2 form
        } else {
            // Create a new application for stage 2 if it doesn't exist
            Application::create([
                'user_id' => $id,
                'status' => 'Not Approved',
                'comment' => 'Video has not been Uploaded.',
                'stage' => 2,
            ]);
        }

        return view('layout.stage2', compact('user'));
    }


    public function updateStage2(Request $request, $id)
    {
        $request->validate([
            'videoFile' => 'required|mimes:mp4,mov,avi,wmv|max:51200', // 50MB max
        ]);

        $user = auth()->user();
        $application = Application::where('user_id', $user->id)
            ->where('stage', 2) // Only fetch stage 2 record
            ->first();

        // Check existing status and block/allow accordingly
        if ($application) {
            switch ($application->status) {
                case 'Pending Review':
                    return back()->with('error', 'Your video is under review. You cannot upload another at this time.');
                case 'Approved':
                    return back()->with('error', 'Your video has been approved. You can only view it, or proceed to the next stage.');
                case 'Not approved':
                    return back()->with('error', 'Your video submission is not approved. You can try again in our next edition. Wishing you all the best.');
                case 'Reviewed':
                    // delete old file if it exists
                    if ($application->content) {
                        $oldFile = public_path('video/' . $application->content);
                        if (file_exists($oldFile)) {
                            unlink($oldFile); // delete the old video
                        }
                    }
                    break;
            }
        }

        // Check if the user is allowed to upload (either not under review or approved for upload)
        if ($request->hasFile('videoFile')) {
            $video = $request->file('videoFile');
            $fileSize = round($video->getSize() / 1048576, 2); // Get size before moving
            $filename = time() . '_' . $video->getClientOriginalName();
            $video->move(public_path('video'), $filename);

            // Update or create the stage 2 record
            Application::updateOrCreate(
                ['user_id' => $user->id, 'stage' => 2], // Ensure it’s for stage 2
                [
                    'comment' => 'Craft video uploaded',
                    'content' => $filename,
                    'file_size' => $fileSize . ' MB',
                    'status' => 'Pending Review', // Status set to pending
                ]
            );

            return redirect()->route('user-dashboard')->with('success', 'Video uploaded successfully and is now pending review.');
        }

        return back()->with('error', 'Please upload a valid video file.');
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

    public function videoReview(Request $request)
    {
        // Validate the request
        $request->validate([
            'user_stage_id' => 'required|integer|exists:applications,id',
            'status' => 'required|string|in:Not Approved,Reviewed,Approved',
            'comment' => 'nullable|string|max:1000',
        ]);

        // Find the application by ID
        $application = Application::find($request->user_stage_id);

        // Update the current application with the review details
        $application->status = $request->status;
        $application->comment = $request->comment;
        $application->reviewed_at = now();
        $application->save();

        // Check if the status is "Approved"
        if ($request->status === 'Approved') {
            // Update the user's current stage in the user table
            $user = $application->user;  // Assuming there's a relationship to the user
            $user->current_stage = 3;
            $user->save();

            // Create a new record in the application table for stage 3
            Application::create([
                'user_id' => $application->user_id,
                'status' => 'Not Approved',
                'comment' => 'Business Pitch has not been submitted.',
                'stage' => 3,
            ]);
        }

        // Return a success message
        return response()->json(['message' => 'Review updated successfully']);
    }


    
}
