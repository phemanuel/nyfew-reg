<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Application;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    //
    public function userDashboard()
    {
        $user = auth()->user();

        // Fetch the application records for each stage
        $application = Application::where('user_id', $user->id)->get();
        $stage1 = Application::where('stage', 1)
        ->orderBy('status', 'asc')
        ->paginate(10);

        $interestsCount = Application::select('users.interest', DB::raw('count(*) as total'))
        ->join('users', 'applications.user_id', '=', 'users.id')
        ->where('applications.stage', 1)
        ->where('applications.status', 'Approved')
        ->where('users.user_type', 2)
        ->whereIn('users.applicant_type', ['OLD', 'NEW'])
        ->groupBy('users.interest')
        ->orderBy('users.interest')
        ->get();

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
         'stage1Count', 'stage2Count', 'stage3Count', 'stage4Count','interestsCount'));
    }
    
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('layout.stage1',compact('user'));
    }    

    public function updateStage1(Request $request)
    {
        try {
            // Validate the incoming data
            $validatedData = $request->validate([
                'surname'     => 'required|string|max:255',
                'first_name'  => 'required|string|max:255',
                'other_name'  => 'required|string|max:255',
                'mobile_no'   => 'required|string|max:50',
                'mobile_no1'  => 'required|string|max:50',
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
                'interest_fashion'   => 'nullable|in:YES,NO',
                'image'       => 'nullable|image|mimes:jpeg,png,jpg|max:10048',
            ]);
    
            $user = Auth::user();
    
            // Handle file upload
            if ($request->hasFile('image')) {
                if ($user->image && file_exists(public_path('uploads/' . $user->image))) {
                    unlink(public_path('uploads/' . $user->image));
                }
    
                $imageName = time() . '.' . $request->image->extension();
                $request->image->move(public_path('uploads'), $imageName);
                $user->image = $imageName;
            }
    
            // Update user fields with fallback to 'N/A'
            $user->surname     = $validatedData['surname'] ?? 'N/A';
            $user->first_name  = $validatedData['first_name'] ?? 'N/A';
            $user->other_name  = $validatedData['other_name'] ?? 'N/A';
            $user->mobile_no   = $validatedData['mobile_no'] ?? 'N/A';
            $user->mobile_no1  = $validatedData['mobile_no1'] ?? 'N/A';
            $user->gender      = $validatedData['gender'] ?? 'N/A';
            $user->dob         = $validatedData['dob'] ?? 'N/A';
            $user->address     = $validatedData['address'] ?? 'N/A';
            $user->occupation  = $validatedData['occupation'] ?? 'N/A';
            $user->instagram   = $validatedData['instagram'] ?? 'N/A';
            $user->facebook    = $validatedData['facebook'] ?? 'N/A';
            $user->snapchat    = $validatedData['snapchat'] ?? 'N/A';
            $user->twitter     = $validatedData['twitter'] ?? 'N/A';
            $user->interest    = $validatedData['interest'] ?? 'N/A';
            $user->qst1        = $validatedData['qst1'] ?? 'N/A';
            $user->qst2        = $validatedData['qst2'] ?? 'N/A';
            $user->if_yes_qst2 = $validatedData['ifyesqst2'] ?? 'N/A';
            $user->interest_fashion = $validatedData['interest_fashion'] ?? 'N/A';
            $user->current_stage = 2;
            $user->applicant_type = 'NEW';
    
            $user->save();
    
            // Update Stage 1 application
            $application = Application::where('user_id', $user->id)->where('stage', 1)->first();
            if ($application) {
                $application->status = 'Approved';
                $application->comment = 'Stage 1 Completed.';
                $application->save();
            }
    
            // Create Stage 2 application if not exists
            $applicationExists = Application::where('user_id', $user->id)->where('stage', 2)->exists();
    
            if (!$applicationExists) {
                Application::create([
                    'user_id' => $user->id,
                    'status' => 'Not Approved',
                    'comment' => 'Not Completed',
                    'stage' => 2,
                ]);
            }
    
            return redirect()->route('user-dashboard')->with('success', 'Stage 1 updated successfully!');
        } catch (\Exception $e) {
            \Log::error('Stage1 Update Error: '.$e->getMessage());
    
            return back()->with('error', 'An error occurred while updating Stage 1. Please try again.');
        }
    }
    
    public function stage2Edit($id)
    {
        $startDate = "2025-08-27";
        $dueDate = "2025-09-30";
        $currentDate = date('Y-m-d');
        
        $user = User::findOrFail($id);
        $userEmail = $user->email;
        
        if ($userEmail == 'emmakinyooye@gmail.com'){
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

        if ($currentDate < $startDate) {
            return redirect()->back()->with('error', 'Entries for stage 2 have not commenced, please check back.');
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

    public function stage2P2Edit($id)
    {
        $startDate = "2025-08-27";
        $dueDate = "2025-09-30";
        $currentDate = date('Y-m-d');
        
        $user = User::findOrFail($id);
        $userEmail = $user->email;
        
        if ($userEmail == 'emmakinyooye@gmail.com'){
            // Retrieve the stage 2 application if it exists
        $application = Application::where('user_id', $id)
            ->where('stage', 2)
            ->first();

        if ($application) {
            // Check the application status
            if ($application->status1 == 'Pending Review') {
                return redirect()->back()->with('error', 'Your video is still under review, you cannot upload yet.');
            } elseif ($application->status1 == 'Approved') {
                return redirect()->back()->with('error', 'Your video has been approved, you can only view or proceed to the next stage.');
            }

            // If status is Not Approved or Reviewed, allow access to stage 2 form
        } else {
            // Create a new application for stage 2 if it doesn't exist
            Application::create([
                'user_id' => $id,
                'status1' => 'Not Approved',
                'comment' => 'Video has not been Uploaded.',
                'stage' => 2,
            ]);
        }

        return view('layout.stage2_p2', compact('user'));
            
        }

        if ($currentDate < $startDate) {
            return redirect()->back()->with('error', 'Entries for stage 2 have not commenced, please check back.');
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
            if ($application->status1 == 'Pending Review') {
                return redirect()->back()->with('error', 'Your video is still under review, you cannot upload yet.');
            } elseif ($application->status1 == 'Approved') {
                return redirect()->back()->with('error', 'Your video has been approved, you can only view or proceed to the next stage.');
            }

            // If status is Not Approved or Reviewed, allow access to stage 2 form
        } else {
            // Create a new application for stage 2 if it doesn't exist
            Application::create([
                'user_id' => $id,
                'status1' => 'Not Approved',
                'comment' => 'Video has not been Uploaded.',
                'stage' => 2,
            ]);
        }

        return view('layout.stage2_p2', compact('user'));
    }



    public function updateStage2(Request $request, $id)
    {
        // Validate form input
        $request->validate([
            'videoOption' => 'required|string',
            'fbLink' => 'nullable|url',
            'twLink' => 'nullable|url',
            'inLink' => 'nullable|url',
            'ttLink' => 'nullable|url',
            'videoFile' => 'required|mimes:mp4,mov,avi,wmv|max:20480', // 20MB max
        ]);

        // Check that at least 3 links are provided
        $links = [
            $request->fbLink,
            $request->twLink,
            $request->inLink,
            $request->ttLink,
        ];

        $validLinks = array_filter($links, function ($link) {
            return !empty($link);
        });

        if (count($validLinks) < 3) {
            return back()->with('error', 'Please provide at least 3 valid social media post links.');
        }

        $user = auth()->user();
        $application = Application::where('user_id', $user->id)
            ->where('stage', 2)
            ->first();

        // Handle status logic
        if ($application) {
            switch ($application->status) {
                case 'Pending Review':
                    return back()->with('error', 'Your submission is under review. You cannot upload another at this time.');
                case 'Approved':
                    return back()->with('error', 'Your submission has been approved. You can only view it, or proceed to the next stage.');
                case 'Not approved':
                    return back()->with('error', 'Your submission is not approved. You can try again in our next edition.');
                case 'Reviewed':
                    if ($application->content) {
                        $oldFile = public_path('video/phase1/' . $application->content);
                        if (file_exists($oldFile)) {
                            unlink($oldFile);
                        }
                    }
                    break;
            }
        }

        // Handle video upload
        $video = $request->file('videoFile');
        $fileSize = round($video->getSize() / 1048576, 2);
        $filename = time() . '_' . $video->getClientOriginalName();
        $video->move(public_path('video/phase1/'), $filename);

        // Save or update application
        Application::updateOrCreate(
            ['user_id' => $user->id, 'stage' => 2],
            [
                'comment' => 'Video uploaded with creative option: ' . $request->videoOption,
                'content' => $filename,
                'file_size' => $fileSize . ' MB',
                'status' => 'Pending Review',
                'video_option' => $request->videoOption,
                'p1_link1' => $request->fbLink,
                'p1_link2' => $request->twLink,
                'p1_link3' => $request->inLink,
                'p1_link4' => $request->ttLink,
            ]
        );

        return redirect()->route('user-dashboard')->with('success', 'Submission for Stage2-Phase1 uploaded successfully and is now pending review.');
    }

    public function updateStage2P2(Request $request, $id)
    {
        // Validate form input
        $request->validate([
            'fbLink' => 'nullable|url',
            'twLink' => 'nullable|url',
            'inLink' => 'nullable|url',
            'ttLink' => 'nullable|url',
            'videoFile' => 'required|mimes:mp4,mov,avi,wmv|max:20480', // 20MB max
        ]);

        // Check that at least 3 links are provided
        $links = [
            $request->fbLink,
            $request->twLink,
            $request->inLink,
            $request->ttLink,
        ];

        $validLinks = array_filter($links, function ($link) {
            return !empty($link);
        });

        if (count($validLinks) < 3) {
            return back()->with('error', 'Please provide at least 3 valid social media post links.');
        }

        $user = auth()->user();
        $application = Application::where('user_id', $user->id)
            ->where('stage', 2)
            ->first();

        // Handle status logic
        if ($application) {
            switch ($application->status1) {
                case 'Pending Review':
                    return back()->with('error', 'Your submission is under review. You cannot upload another at this time.');
                case 'Approved':
                    return back()->with('error', 'Your submission has been approved. You can only view it, or proceed to the next stage.');
                case 'Not approved':
                    return back()->with('error', 'Your submission is not approved. You can try again in our next edition.');
                case 'Reviewed':
                    if ($application->content) {
                        $oldFile = public_path('video/phase2/' . $application->content1);
                        if (file_exists($oldFile)) {
                            unlink($oldFile);
                        }
                    }
                    break;
            }
        }

        // Handle video upload
        $video = $request->file('videoFile');
        $fileSize = round($video->getSize() / 1048576, 2);
        $filename = time() . '_' . $video->getClientOriginalName();
        $video->move(public_path('video/phase2/'), $filename);

        // Save or update application
        Application::updateOrCreate(
            ['user_id' => $user->id, 'stage' => 2],
            [
                'comment' => 'Video uploaded with creative option: ' . $request->videoOption,
                'content1' => $filename,
                'file_size1' => $fileSize . ' MB',
                'status1' => 'Pending Review',
                'p2_link1' => $request->fbLink,
                'p2_link2' => $request->twLink,
                'p2_link3' => $request->inLink,
                'p2_link4' => $request->ttLink,
            ]
        );

        return redirect()->route('user-dashboard')->with('success', 'Submission for Stage2-Phase2 uploaded successfully and is now pending review.');
    }



    public function fetchStageData($stage)
    {
        // Fetch users based on selected stage
        $stage1 = \App\Models\Application::with('user')
            ->where('stage', $stage)
            ->orderBy('status', 'asc')
            ->paginate(10);

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

    public function exportStageData($stage)
    {
        $applications = \App\Models\Application::with('user')
            ->where('stage', $stage)
            ->orderBy('status', 'asc')
            ->get();

        $csv = [];
        $csv[] = [ 'Current Stage','Full Name', 'Email', 'Phone No' , 'Whatsapp No', 'Address' 
        , 'Gender', 'Dob' ,'Instagram', 'Facebook', 'Snapchat', 'Twitter','Occupation', 'Field Of Interest','Knowledge Level', 'Fashion Illustrator',
         'Other Profession', 'State Profession','Date','Status']; // headers

        foreach ($applications as $app) {
            $user = $app->user;

            $csv[] = [
                $user->current_stage ?? 'n/a',
                $user ? $user->surname . ' ' . $user->first_name . ' ' . $user->other_name : 'n/a',
                $user->email ?? 'n/a',
                $user->mobile_no ?? 'n/a',
                $user->whatsapp_no ?? $user->mobile_no ?? 'n/a',
                $user->address ?? 'n/a',
                $user->gender ?? 'n/a',
                $user->dob ?? 'n/a',
                $user->instagram ?? 'n/a',
                $user->facebook ?? 'n/a',
                $user->snapchat ?? 'n/a',
                $user->twitter ?? 'n/a',
                $user->occupation ?? 'n/a',
                $user->interest ?? 'n/a',
                $user->qst1 ?? 'n/a',
                $user->interest_fashion ?? 'n/a',
                $user->qst2 ?? 'n/a',
                $user->if_yes_qst2 ?? 'n/a',
                $user && $user->created_at ? $user->created_at->format('Y-m-d H:i') : 'n/a',
                $app->status,
            ];
        }

        $filename = 'stage_' . $stage . '_export_' . date('Ymd_His') . '.csv';
        $handle = fopen('php://temp', 'r+');

        foreach ($csv as $row) {
            fputcsv($handle, $row);
        }

        rewind($handle);
        $content = stream_get_contents($handle);
        fclose($handle);

        return Response::make($content, 200, [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename={$filename}",
        ]);
    }


    
}
