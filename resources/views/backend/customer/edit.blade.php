@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>Edit Customer</h3>
        <a class="nl primary" href="{{ route('customer.all') }}" style="margin-left: auto;">All Customer</a>
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
        <form action="{{ route('customer.update', $customer->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form_row">
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Full Name <span class="require">*</span></label>
                        <input type="text" name="full_name" class="form_control" value="{{ $customer->full_name }}" required>
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Customer phone <span class="require">*</span></label>
                        <input type="text" name="phone" class="form_control" value="{{ $customer->phone }}" required>
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Customer Email</label>
                        <input type="email" name="email" class="form_control" value="{{ $customer->email }}">
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Customer address</label>
                        <input type="text" name="address" class="form_control" value="{{ $customer->address }}">
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Customer Profile</label>
                        <input type="file" name="profile" class="form_control" onchange="preview(this, '#prev_out')">
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <div id="prev_out">
                            <img src="{{ $customer->profile }}" alt="">
                        </div>
                    </div>
                </div>
                <div class="col_lg_12">
                    <div class="form_group">
                        <button class="nl primary" type="submit">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@push('footer_js')
<script>
let b = document.querySelector('body');
function preview(F, target_output) {
    let selected_file = F.files[0];
    let img = document.createElement('img');
        img.src = URL.createObjectURL(selected_file);
        img.alt = 'Preview not found';
    let container = document.querySelector(target_output);
        container.innerHTML = '';
    container.appendChild(img);
}
</script>
@endpush
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