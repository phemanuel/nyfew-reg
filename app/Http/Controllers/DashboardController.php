<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Application;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function userDashboard()
    {
        $user = auth()->user();

        $application = Application::where('user_id', $user->id)->get();        

        return view('layout.user-dashboard', compact('application'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    public function updateStage1(Request $request)
    {
        $user = User::findOrFail($request->user_id);

        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            // Add validation rules for other fields
        ]);

        $user->update($validated);

        return redirect()->route('user.dashboard')->with('success', 'Profile updated successfully.');
    }
    
}
