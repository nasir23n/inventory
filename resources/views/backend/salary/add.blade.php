@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>Pay Salary</h3>
        <a class="nl primary" href="{{ route('supplier.all') }}" style="margin-left: auto;">All Salary</a>
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
        <form action="{{ route('salary.pay', $employee->id) }}" method="post">
            @csrf
            <div class="form_row">
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Mounth <span class="require">*</span></label>
                        <select id="" name="mounth" class="form_control">
                            <option value="" selected disabled>__Select Mounth__</option>
                            <option value="January"> January </option>
                            <option value="February"> February </option>
                            <option value="March"> March </option>
                            <option value="April"> April </option>
                            <option value="May"> May </option>
                            <option value="Jun"> Jun </option>
                            <option value="July"> July </option>
                            <option value="August"> August </option>
                            <option value="September"> September </option>
                            <option value="October"> October </option>
                            <option value="November"> November </option>
                            <option value="December"> December </option>
                        </select>
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Shop Name <span class="require">*</span></label>
                        <input type="number" name="salary" class="form_control" placeholder="Salary" value="{{ $employee->sallery }}" required>
                    </div>
                </div>
                <div class="col_lg_12">
                    <div class="form_group">
                        <button class="nl primary" type="submit">Pay</button>
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