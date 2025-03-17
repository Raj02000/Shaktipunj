<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::simplePaginate(15);

        return view('admin.faqs.index', compact('faqs'));
    }

    public function show(Faq $faq)
    {
        return view('admin.faqs.view', compact('faq'));
    }

    public function create()
    {
        return view('admin.faqs.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'questions' => 'required|array|min:1',
            'questions.*' => 'required|string|max:255',
            'answers' => 'required|array|min:1',
            'answers.*' => 'required|string',
        ]);

        dd($request->toArray());

        $questions = $request->questions;
        $answers = $request->answers;

        if (count($questions) !== count($answers)) {
            return response()->json(['error' => 'The number of questions and answers must match'], 400);
        }

        foreach ($questions as $key => $question) {
            $faq = Faq::create([
                'question' => $question,
                'answer' => $answers[$key],
            ]);
        }

        return redirect()->route('faq.index')->with('success', 'FAQ added successfully');
    }

    public function edit(Faq $faq)
    {
        return view('admin.faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);

        return redirect()->route('faq.index')->with('success', 'FAQ updated successfully');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'FAQ deleted successfully');
    }
}
