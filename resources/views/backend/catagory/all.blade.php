@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>All Category</h3>
        <a class="nl primary" href="{{ route('catagory.add') }}" style="margin-left: auto;">Add Category</a>
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
                        <th style="width: 150px;">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($catagory as $item)    
                        <tr>
                            <td>{{ $item->c_name }}</td>
                            <td>
                                <div class="flex">
                                    <a href="{{ route('catagory.edit', $item->id) }}" class="nl warning social"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('catagory.delete', $item->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this category?')">
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