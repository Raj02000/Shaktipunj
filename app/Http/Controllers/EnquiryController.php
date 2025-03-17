<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;

class EnquiryController extends Controller
{
    public function contactIndex()
    {
        $contact = Enquiry::latest()->simplePaginate(15);

        return view('admin.contact.index', compact('contact'));
    }

    public function contactShow(Enquiry $contact)
    {
        return view('admin.contact.view', compact('contact'));
    }

    public function enquiryIndex()
    {
        $enquiry = Enquiry::select(['id', 'name', 'created_at'])->simplePaginate(15);

        return view('admin.enquiry.index', compact('enquiry'));
    }

    public function enquiryShow(Enquiry $enquiry)
    {

        return view('admin.enquiry.view', compact('enquiry'));
    }
}
