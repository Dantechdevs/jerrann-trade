@extends('layouts.admin')
@section('title', 'Repair #' . $repair->id)
@section('page-title', '🔧 Repair Request #' . $repair->id)

@section('content')
<div style="display:grid;grid-template-columns:1fr 1fr;gap:1.5rem;margin-bottom:1.5rem;">

    <div class="card">
        <div class="card-header">Device & Customer Info</div>
        <div class="card-body" style="font-size:0.9rem;line-height:2.1;">
            <div><strong>Customer:</strong> {{ $repair->user->name ?? '–' }} ({{ $repair->user->email ?? '' }})</div>
            <div><strong>Phone:</strong> {{ $repair->phone }}</div>
            <div><strong>Device:</strong> {{ ucfirst($repair->device_type) }}</div>
            <div><strong>Brand / Model:</strong> {{ $repair->brand }} {{ $repair->model }}</div>
            <div><strong>Submitted:</strong> {{ $repair->created_at->format('d M Y, g:i A') }}</div>
            <div style="margin-top:0.5rem;"><strong>Issue:</strong></div>
            <div style="background:#f5f7fa;border-radius:6px;padding:0.75rem;color:#333;font-size:0.88rem;line-height:1.7;">
                {{ $repair->issue_description }}
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header">Update Repair Status</div>
        <div class="card-body">
            <p style="font-size:0.88rem;margin-bottom:1rem;">
                Current: <span class="badge badge-{{ $repair->status_badge }}">{{ str_replace('_',' ',$repair->status) }}</span>
            </p>
            <form action="{{ route('admin.repairs.update', $repair) }}" method="POST">
                @csrf @method('PATCH')
                <div class="form-group">
                    <label>Status *</label>
                    <select name="status" class="form-control" required>
                        @foreach(\App\Models\Repair::STATUSES as $s)
                            <option value="{{ $s }}" {{ $repair->status===$s?'selected':'' }}>{{ ucfirst(str_replace('_',' ',$s)) }}</option>
                        @endforeach
                    </select>
                </div>
                <div style="display:grid;grid-template-columns:1fr 1fr;gap:0.75rem;">
                    <div class="form-group">
                        <label>Estimated Cost (KES)</label>
                        <input type="number" name="estimated_cost" class="form-control" value="{{ $repair->estimated_cost }}" step="0.01" min="0">
                    </div>
                    <div class="form-group">
                        <label>Actual Cost (KES)</label>
                        <input type="number" name="actual_cost" class="form-control" value="{{ $repair->actual_cost }}" step="0.01" min="0">
                    </div>
                </div>
                <div class="form-group">
                    <label>Technician Notes</label>
                    <textarea name="technician_notes" class="form-control" rows="4">{{ $repair->technician_notes }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary" style="width:100%;">💾 Save Update</button>
            </form>
        </div>
    </div>
</div>

<div style="margin-top:0.5rem;">
    <a href="{{ route('admin.repairs.index') }}" class="btn btn-secondary">← Back to Repairs</a>
</div>
@endsection
