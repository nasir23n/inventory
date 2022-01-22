@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>All Expense</h3>
        <a class="nl primary" href="{{ route('expense.add') }}" style="margin-left: auto;">Add Expense</a>
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
                        <th>Details</th>
                        <th>Amount</th>
                        <th style="width: 150px;">action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($expense as $item)    
                        <tr>
                            <td>{{ $item->details }}</td>
                            <td>{{ $item->amount }}</td>
                            <td>
                                <div class="flex">
                                    <a href="{{ route('expense.edit', $item->id) }}" class="nl warning social"><i class="fas fa-pencil-alt"></i></a>
                                    <form action="{{ route('expense.delete', $item->id) }}" method="post" onsubmit="return confirm('Are you sure to delete this expense?')">
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