@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>Edit Salary</h3>
        <a class="nl primary" href="{{ route('salary.all') }}" style="margin-left: auto;">All Salary</a>
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
        <form action="{{ route('salary.update', $salary->id) }}" method="post">
            @csrf
            <div class="form_row">
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Mounth <span class="require">*</span></label>
                        <select id="" name="mounth" class="form_control">
                            @foreach ($mounth as $item)
                                @if ($salary->mounth == $item)
                                    <option value="{{ $item }}" selected> {{ $item }} </option>
                                @else
                                    <option value="{{ $item }}"> {{ $item }} </option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Shop Name <span class="require">*</span></label>
                        <input type="number" name="salary" class="form_control" placeholder="Salary" value="{{ $salary->salary }}" required>
                    </div>
                </div>
                <div class="col_lg_12">
                    <div class="form_group">
                        <button class="nl primary" type="submit">Update</button>
                    </div>
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