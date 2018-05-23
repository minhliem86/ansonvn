<?php

namespace App\Modules\Frontend\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests;
use App\Http\Requests\FormRequest;
use Event;
use App\Events\SendEmailEvent;

use App\Repositories\ContactRepository;
use App\Repositories\BranchRepository;

class LienheController extends Controller
{
    protected $contact;
    protected $branch;

    public function __construct(ContactRepository $contact, BranchRepository $branch)
    {
        $this->contact = $contact;
        $this->branch = $branch;
    }
    public function getLienhe()
    {
        $branch = $this->branch->all();
        return view('Frontend::page.contact', compact('branch'));
    }

    public function postLienhe(FormRequest $request)
    {
        $data = [
            'email' => $request->input('email'),
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'message' => $request->input('message'),
        ];
        $this->contact->create($data);
        event(new SendEmailEvent('Frontend::emails.response',['data'=>$data],'trungtamthongbao@gmail.com',$request->input('email'), 'Phản hồi khách hàng'));
        return redirect()->back()->with('success-email','done');
    }
}
