<?php

namespace App\Http\Controllers;

use App\Mail\AnnouncementEmail;
use App\Models\Announcement;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\Mailer\Exception\TransportException;

class AnnouncementController extends Controller
{
    public function create()
    {
        return view('admin.create_announcement');
    }

    public function store(Request $request)
    {
        try {
            $validatedAnnouncement = $request->validate([
                'subject' => 'required',
                'message' => 'required',
            ]);

            $announcement = Announcement::create($validatedAnnouncement);
            $subscribers = Subscriber::pluck('email')->toArray();

            foreach ($subscribers as $subscriberEmail) {
                Mail::to($subscriberEmail)->send(new AnnouncementEmail($announcement, $subscriberEmail));
            }

            return redirect()->back()->with('success', 'Announcement sent successfully!');
        } catch (TransportException $r) {
            return redirect()->back()->with('success', 'Failed to send notification. Please check your internet connection and try again.');
        } catch (\Exception $e) {
            return redirect()->back()->with('success', 'An error occurred while sending the announcement. Please try again later.');
        }
    }
}
