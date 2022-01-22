@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>All Salary</h3>
        {{-- <a class="nl primary" href="{{ route('salary.add') }}" style="margin-left: auto;">Add Salary</a> --}}
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
                        <th>Month Name</th>
                        <th style="width: 150px;">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($mounth as $mounth_name)
                        <tr>   
                            <td>{{ $mounth_name }}</td>
                            <td>
                                <div class="flex">
                                    <a href="{{ route('salary.view', $mounth_name) }}" class="nl primary x1">View All</a>
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