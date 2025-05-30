<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use App\Models\PhoneAudio;
use Illuminate\Http\Request;
use App\Models\PhoneLocation;
use App\Models\PhoneSnapshot;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ExpoController extends Controller
{

    public function index() {

        $locations = PhoneLocation::all();
        $audios = PhoneAudio::all();
        $snapshots = PhoneSnapshot::all();
        foreach ($locations as $tochukwu) {
            $tochukwu->name = 'BluTraq';
        }
        return Inertia::render('Dashboard', [
            'locations' => $locations,
            'audios' => $audios,
            'snapshots' => $snapshots,
        ]);
    }

    public function register(Request $request) {

        $request->validate([
            'fullname' => 'required|string|max:255',
            'email' => 'required|string',
            'pin' => 'required',
        ]);

        // Check if the email is already registered
        $existingUser = User::where('email', $request->email)->first();
        if ($existingUser) {
            return response()->json([
                'status' => false,
                'message' => 'Email already registered']
            );
        }

        User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->pin),
        ]);

        return response()->json([
            'status' => true,
            'message' => 'Success']
        );


    }

    public function storeaudio(Request $request) {
        if ($request->hasFile('audio')) {
            $file = $request->file('audio');

            // Optional: Validate
            $request->validate([
                'audio' => 'file|mimes:wav,mp3,ogg|max:10240', // max 10MB
            ]);

            // Store in storage/app/public/audio
            $path = $file->store('audio', 'public');
            // Save to database
            PhoneAudio::create([
                //'user_id' => $request->user_id,
                'file_path' => $path,
                'file_name' => $file->getClientOriginalName(),
            ]);

            return 'true';
        }

        return 'false';
    }

    public function storesnapshot(Request $request) {
        if ($request->hasFile('image')) {
            $imageData = $request->input('image');

            // Decode the base64 string
            $image = base64_decode($imageData);

            // Generate a unique filename
            $filename = 'snapshot_' . time() . '.jpg';

            // Save the file to storage/app/public/snapshots
            Storage::disk('public')->put("snapshots/{$filename}", $image);

            // Save snapshot
            PhoneSnapshot::create([
                //'user_id' => $request->user_id,
                'file_path' => "snapshots/{$filename}",
                'file_name' => $filename,
            ]);

            return true;
        }
        return false;
    }

    public function storelocation(Request $request) {

        PhoneLocation::create([
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'accuracy' => $request->accuracy,
            'altitude' => $request->altitude,
            'altitude_accuracy' => $request->altitudeAccuracy,
            'heading' => $request->heading,
            'speed' => $request->speed,
        ]);

        return true;
    }
}
