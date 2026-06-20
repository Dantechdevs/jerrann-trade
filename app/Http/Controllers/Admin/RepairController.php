<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Repair;
use Illuminate\Http\Request;

class RepairController extends Controller
{
    public function index(Request $request)
    {
        $query = Repair::with('user')->latest();

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        $repairs = $query->paginate(20);

        return view('admin.repairs.index', compact('repairs'));
    }

    public function show(Repair $repair)
    {
        $repair->load('user');
        return view('admin.repairs.show', compact('repair'));
    }

    public function update(Request $request, Repair $repair)
    {
        $data = $request->validate([
            'status'           => 'required|in:submitted,diagnosed,quoted,approved,in_progress,completed,notified',
            'technician_notes' => 'nullable|string|max:2000',
            'estimated_cost'   => 'nullable|numeric|min:0',
            'actual_cost'      => 'nullable|numeric|min:0',
        ]);

        $repair->update($data);

        return back()->with('success', "Repair status updated to {$request->status}.");
    }
}
