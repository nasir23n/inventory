@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>All Employee</h3>
        <a class="nl primary" href="{{ route('employee.add') }}" style="margin-left: auto;">Add Employee</a>
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
                        <th style="width: 90px;">Profile</th>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Salary</th>
                        <th>Joining Date</th>
                        <th style="width: 150px;">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($employee as $item)    
                        <tr>
                            <td>
                                <img src="{{ $item->profile }}" alt="{{ $item->fullname }}" style="max-width: 80px;">
                            </td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->sallery }}TK</td>
                            <td>{{ $item->joining_date }}</td>
                            <td>
                                <div class="flex">
                                    <a href="{{ route('employee.edit', $item->id) }}" class="nl warning social"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('employee.delete', $item->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this employee?')">
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