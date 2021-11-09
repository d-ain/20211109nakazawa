<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;

class ContactController extends Controller
{
    public function management()
    {
        $items = Contact::all();
        $items = Contact::Paginate(10);
        return view('management', ['items' => $items]);
    }

public function search(Request $request)
{

$items = Contact::Paginate(10);

$email = $request->input('email');
$fullname = $request->input('fullname');
$fromdate = $request->input('fromdate');
$enddate = $request->input('enddate');
$gender = $request->input('gender');


if(!empty($email))
$items = Contact::where('email', 'LIKE',"%{$email}%")
->paginate(10);

if(!empty($fullname))
$items = Contact::where('fullname', 'LIKE',"%{$fullname}%")
->paginate(10);

if(!empty($fromdate) and !empty($enddate))
$items = Contact::where('created_at', '<=', $enddate) 
->orwhere('created_at', '>=', $fromdate)
->paginate(10);

  if(empty($fromdate) and !empty($enddate))
  $items = Contact::where('created_at', '<=', $enddate) 
  ->paginate(10);

    if(!empty($fromdate) and empty($enddate))
    $items = Contact::where('created_at', '>=', $fromdate)
    ->paginate(10);

    if(!empty($gender))
    $items = Contact::where('gender', '=', $gender)
    ->paginate(10);

    if(empty($fullname) and empty($email) and empty($enddate) and empty($fromdate) and empty($gender))
    $items = Contact::Paginate(10);


    return view('management', ['items' => $items]);
    }


    public function contact(Request $request)
    {
        return view('contact');
    }

    public function post(ClientRequest $request)
    {
        return view('contact');
    }

    public function confirm(ClientRequest $request)
    {
        $input = $request->all();
        $request->flash();
        return view('confirm',['input' => $input]);

    }

    public function complete(Request $request)
    {
        $input = $request->all();
        unset($input['_token']);
        Contact::create($input);
        return view('complete');
    }

    public function delete(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/contact/management');
    }
}