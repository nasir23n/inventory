@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>Salary of {{ $mounth }}</h3>
        {{-- <a class="nl primary" href="{{ route('employee.add') }}" style="margin-left: auto;">Add Employee</a> --}}
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
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Joining Date</th>
                        <th style="width: 100px;">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($salary as $item)    
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->salary }}TK</td>
                            <td>{{ date('d-M-Y', strtotime($item->created_at)) }}</td>
                            <td>
                                <div class="flex">
                                    <a href="{{ route('salary.edit', $item->id) }}" class="nl primary x1">Edit</a>
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