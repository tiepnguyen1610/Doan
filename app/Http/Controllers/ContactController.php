<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;
use Log;

class ContactController extends Controller
{
	private $contact;
    public function __construct(Contact $contact)
    {
    	$this->contact = $contact;
    }

    public function index()
    {
    	$contacts = $this->contact->all();
    	return view('backend.admin.contacts.list', compact('contacts'));
    }

    public function create()
    {
    	return view('backend.admin.contacts.add');	
    }

    public function store(Request $request)
    {
    	$dataInsert = [
    		'description' => $request->txtDescription,
    		'address' => $request->txtAddress,
    		'email' => $request->txtEmail,
    		'phone' => $request->txtPhone
    	];

    	$this->contact->create($dataInsert);
    	return redirect()->back()->with([
    		'level' => 'success',
    		'message' => 'Thêm mới thành công!'
    	]);
    }

    public function edit($id)
    {
        $contact = $this->contact->find($id);
    	return view('backend.admin.contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
    	$dataUpdate = [
            'description' => $request->txtDescription,
            'address' => $request->txtAddress,
            'email' => $request->txtEmail,
            'phone' => $request->txtPhone
        ];
        $this->contact->find($id)->update($dataUpdate);
        return redirect()->route('contacts.index')->with([
            'level' => 'success',
            'message' => 'Thêm mới thành công!'
        ]);
    }

    public function destroy($id)
    {
    	try {

    		$this->contact->find($id)->delete();
	    	return response()->json([
	    		'code' => 200,
	    		'message' => 'success'
	    	],200);

    	} catch(\Exception $exception) {
    		Log::error('Message: ' . $exception->getMessage());
    		return response()->json([
    			'code' => 500,
    			'message' => 'fail'
    		],500);
    	}
    	
    }
}
