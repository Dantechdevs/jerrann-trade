@extends('layouts.admin')
@section('title', 'Customers')
@section('page-title', '👥 Customers')

@section('content')
<div class="card">
    <table>
        <thead>
            <tr><th>#</th><th>Name</th><th>Email</th><th>Phone</th><th>Joined</th></tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
            <tr>
                <td>{{ $customer->id }}</td>
                <td><strong>{{ $customer->name }}</strong></td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->phone ?? '–' }}</td>
                <td>{{ $customer->created_at->format('d M Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
<div class="pagination">{{ $customers->links() }}</div>
@endsection
