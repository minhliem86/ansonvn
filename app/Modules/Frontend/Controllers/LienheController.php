<?php

namespace App\Modules\Frontend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Http\Requests\FormRequest;
use Event;
use App\Events\SendEmailEvent;

use App\Repositories\ContactRepository;

class LienheController extends Controller
{
    protected $contactRepo;

    public function __construct(ContactRepository $contact)
    {
        $this->contactRepo = $contact;
    }
    public function getLienhe()
    {
      return view('Frontend::page.contact');
    }

    public function postLienhe(FormRequest $request)
    {
        $data = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ];
        $this->contactRepo->postRegister($data);
        return redirect()->back()->with('success-email','done');
    }
}
