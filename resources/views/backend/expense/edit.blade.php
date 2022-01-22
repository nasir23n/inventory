@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>Edit Expense</h3>
        <a class="nl primary" href="{{ route('expense.all') }}" style="margin-left: auto;">All Expense</a>
    </div>
    <div class="body">
        @if ($errors->any())
            <div class="alert danger">
                @foreach ($errors->all() as $err)
                    {{ $err }} <br>
                @endforeach
            </div>
        @endif
        @if (session('success'))
            <div class="alert success">
                {{ session('success') }}
            </div>
        @endif
        <br>
        <form action="{{ route('expense.update', $expense->id) }}" method="post">
            @csrf
            <div class="form_row">
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Expense Details <span class="require">*</span></label>
                        <textarea class="form_control" name="details" rows="5">{{ $expense->details }}</textarea>
                    </div>
                </div>
            </div> 
            <div class="form_row">
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Expense Amount <span class="require">*</span></label>
                        <input type="number" name="amount" class="form_control" value="{{ $expense->amount }}" required>
                    </div>
                </div>
            </div> 
            <div class="col_lg_12">
                <div class="form_group">
                    <button class="nl primary" type="submit">Save</button>
                </div>
            </div>
        </form>
    </div>
</div> 

@push('header_css')
<style>
.require {
    color: #fa2f14; 
}
#prev_out {
    width: 100%;
    display: flex;
    justify-content: flex-end;
}
#prev_out img {
    max-width: 300px;
    border: 1px solid #ddd;
}
</style>
@endpush

@endsection