<?php

namespace App\Http\Controllers;

use App\Models\Inbox;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Inbox::orderBy('created_at', 'DESC')->get();

        return view('inbox.index', ['data'=>$data]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Inbox::create($request->all());

        // Alert::success('Berhasil', 'Berhasil Mengirim Pesan');
        // return redirect()->back();
        $recaptcha_response = $request->input('g-recaptcha-response');

        if (is_null($recaptcha_response)) {
            return redirect()->back()->with('status', 'Please complete the reCAPTCHA to proceed.');
        }

        $url = "https://www.google.com/recaptcha/api/siteverify";
        $body = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $recaptcha_response,
            'remoteip' => $request->ip()
        ];

        try {
            $response = Http::asForm()->post($url, $body);
            $result = json_decode($response->getBody()->getContents(), true);

            if ($response->successful() && isset($result['success']) && $result['success'] == true) {
                Inbox::create($request->all());
                Alert::success('Berhasil', 'Pesan berhasil dikirim.');
                return redirect()->back();
            } else {
                Alert::error('Error', 'Please complete the reCAPTCHA again to proceed.');
                return redirect()->back();
            }
        } catch (\Exception $e) {
            Log::error('reCAPTCHA verification failed: ' . $e->getMessage());
            Alert::error('Error', 'reCAPTCHA verification failed. Please try again.');
            return redirect()->back();
        }
    }
    

    /**
     * Display the specified resource.
     */
    public function show(Inbox $inbox)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Inbox $inbox)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inbox $inbox)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Inbox $inbox)
    {
        $inbox->delete();

        Alert::success('Berhasil', 'Berhasil Menghapus Pesan!');
        return redirect()->back();
    }
}