@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>All Supplier</h3>
        <a class="nl primary" href="{{ route('supplier.add') }}" style="margin-left: auto;">Add Supplier</a>
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
                        <th>Shop Name</th>
                        <th style="width: 150px;">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($supplier as $item)    
                        <tr>
                            <td>
                                <img src="{{ $item->profile }}" alt="{{ $item->fullname }}" style="max-width: 80px;">
                            </td>
                            <td>{{ $item->full_name }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>{{ $item->shop_name }}</td>
                            <td>
                                <div class="flex">
                                    <a href="{{ route('supplier.edit', $item->id) }}" class="nl warning social"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('supplier.delete', $item->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this employee?')">
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