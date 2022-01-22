@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>All Product</h3>
        <a class="nl primary" href="{{ route('product.add') }}" style="margin-left: auto;">Add Product</a>
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
                        <th style="width: 90px;">Image</th>
                        <th>Name</th>
                        <th>Code</th>
                        <th>Category</th>
                        <th>Buying Price</th>
                        <th>Selling Price</th>
                        <th>Root</th>
                        <th>Quantity</th>
                        <th>Supplier</th>
                        <th style="width: 150px;">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $item)    
                        <tr>
                            <td>
                                <img src="{{ $item->image }}" alt="{{ $item->fullname }}" style="max-width: 80px;">
                            </td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->code }}</td>
                            <td>{{ $item->category_name }}</td>
                            <td>{{ $item->buying_price }}TK</td>
                            <td>{{ $item->selling_price }}TK</td>
                            <td>{{ $item->root }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->supplier_name }}</td>
                            <td>
                                <div class="flex">
                                    <a href="{{ route('product.edit', $item->id) }}" class="nl warning social"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('product.delete', $item->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this item?')">
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