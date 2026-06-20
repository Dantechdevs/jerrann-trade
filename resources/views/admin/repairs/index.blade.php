@extends('layouts.admin')
@section('title', 'Repairs')
@section('page-title', '🔧 Manage Repairs')

@section('content')
<form method="GET" style="display:flex;gap:0.75rem;flex-wrap:wrap;margin-bottom:1.25rem;">
    <select name="status" class="form-control" style="width:190px;">
        <option value="">All Statuses</option>
        @foreach(['submitted','diagnosed','quoted','approved','in_progress','completed','notified'] as $s)
            <option value="{{ $s }}" {{ request('status')===$s?'selected':'' }}>{{ ucfirst(str_replace('_',' ',$s)) }}</option>
        @endforeach
    </select>
    <button type="submit" class="btn btn-primary btn-sm">Filter</button>
    <a href="{{ route('admin.repairs.index') }}" class="btn btn-secondary btn-sm">Reset</a>
</form>

<div class="card">
    <table>
        <thead>
            <tr><th>#</th><th>Customer</th><th>Device</th><th>Status</th><th>Est. Cost</th><th>Date</th><th>Action</th></tr>
        </thead>
        <tbody>
            @foreach($repairs as $repair)
            <tr>
                <td><strong>#{{ $repair->id }}</strong></td>
                <td>{{ $repair->user->name ?? '–' }}</td>
                <td>{{ ucfirst($repair->device_type) }} {{ $repair->brand }} {{ $repair->model }}</td>
                <td><span class="badge badge-{{ $repair->status_badge }}">{{ str_replace('_',' ',$repair->status) }}</span></td>
                <td>{{ $repair->estimated_cost ? 'KES '.number_format($repair->estimated_cost) : '–' }}</td>
                <td>{{ $repair->created_at->format('d/m/y') }}</td>
                <td><a href="{{ route('admin.repairs.show', $repair) }}" class="btn btn-primary btn-sm">View</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pagination">{{ $repairs->links() }}</div>
@endsection
