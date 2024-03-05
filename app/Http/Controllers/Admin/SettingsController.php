<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('authadmin:setting_edit');
    }

    public function index()
    {
        $timezone_identifiers = \DateTimeZone::listIdentifiers();
        return view('backend.settings.index', compact('timezone_identifiers'));
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'name'          => 'required|string|max:50',
            'email'     => 'required|email|max:100',
            'description'   => 'required|string|max:255',
            'logo'      => 'required|string|max:200',
            'icon'      => 'required|string|max:200',

            'phone'      => 'required|string|max:20',
            'address'      => 'required|string|max:255',


            'head_code'   => 'nullable|string|max:5000',
            'footer_code'   => 'nullable|string|max:5000',

            'timezone' => 'required|timezone',

            "facebook" =>  'nullable|url|string|max:255',
            "instagram" =>  'nullable|url|string|max:255',
            "twitter" =>  'nullable|url|string|max:255',
            "linkedIn" =>  'nullable|url|string|max:255',
            "snapchat" =>  'nullable|url|string|max:255',
            "pinterest" =>  'nullable|url|string|max:255',
            "tiktok" =>  'nullable|url|string|max:255',
            "threads" =>  'nullable|url|string|max:255',
            "youtube" =>  'nullable|url|string|max:255',
            "telegram" =>  'nullable|url|string|max:255',
            "whatsapp" =>  'nullable|url|string|max:255',
        ]);
        Settings::where('id', 1)->update([
            'id'            => 1,
            'name'          => $request->name,
            'phone'         => $request->phone,
            'address'       => $request->address,
            'description'   => $request->description,
            'email'         => $request->email,
            'logo'          => $request->logo,
            'icon'          => $request->icon,
            'head_code'     => $request->head_code,
            'footer_code'   => $request->footer_code,
            "facebook"      => $request->facebook,
            "instagram"     => $request->instagram,
            "twitter"       => $request->twitter,
            "linkedIn"      => $request->linkedIn,
            "snapchat"      => $request->snapchat,
            "pinterest"     => $request->pinterest,
            "tiktok"        => $request->tiktok,
            "threads"       => $request->threads,
            "youtube"       => $request->youtube,
            "telegram"      => $request->telegram,
            "whatsapp"      => $request->whatsapp,
        ]);
        set_timezone($request->timezone);
        set_Mail_Smtp(
            $request->MAIL_MAILER,
            $request->MAIL_HOST,
            $request->MAIL_PORT,
            $request->MAIL_USERNAME,
            $request->MAIL_PASSWORD,
            $request->MAIL_ENCRYPTION,
            $request->MAIL_FROM_ADDRESS,
            preg_replace('/\s+/', '', $request->MAIL_FROM_NAME)
        );
        Cache::put('Setting', Settings::first());
        return back()->with('success', __('trans.alert.success.done_update'));
    }
}
