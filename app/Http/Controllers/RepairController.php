<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('repairs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'device_type'       => 'required|in:printer,laptop,tablet,other',
            'brand'             => 'nullable|string|max:100',
            'model'             => 'nullable|string|max:100',
            'issue_description' => 'required|string|min:20|max:2000',
            'phone'             => 'required|string|max:20',
        ]);

        $repair = Repair::create(array_merge(
            $request->only(['device_type','brand','model','issue_description','phone']),
            ['user_id' => auth()->id(), 'status' => 'submitted']
        ));

        return redirect()->route('repairs.show', $repair)
            ->with('success', 'Repair request submitted! We will contact you within 24 hours.');
    }

    public function show(Repair $repair)
    {
        abort_unless($repair->user_id === auth()->id() || auth()->user()->isAdmin(), 403);
        return view('repairs.show', compact('repair'));
    }

    public function index()
    {
        $repairs = Repair::where('user_id', auth()->id())->latest()->paginate(10);
        return view('repairs.index', compact('repairs'));
    }
}
