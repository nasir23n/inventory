@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>All Customer</h3>
        <a class="nl primary" href="{{ route('customer.add') }}" style="margin-left: auto;">Add Customer</a>
    </div>
    <div class="body">
        @if (session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif
        <div class="table_responsive">
            <table class="table bordered">
                <thead>
                    <tr>
                        <th style="max-width: 80px;">Profile</th>
                        <th>Full Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Address</th>
                        <th style="width: 150px;">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($customers as $item)    
                        <tr>
                            <td style="max-width: 80px">
                                <img src="{{ $item->profile }}" alt="{{ $item->full_name }}" style="width: 80px;">
                            </td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->address }}</td>
                            <td>
                                <div class="flex">
                                    <a href="{{ route('customer.edit', $item->id) }}" class="nl warning social"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('customer.delete', $item->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this customer?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="nl danger social" type="submit"><i class="far fa-trash-alt"></i></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection