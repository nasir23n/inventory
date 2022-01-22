@extends('backend.layouts.app')

@section('content')
<div class="panel">
    <div class="header flex">
        <h3>Edit Product</h3>
        <a class="nl primary" href="{{ route('product.all') }}" style="margin-left: auto;">All Product</a>
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
        <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form_row">
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Product Name <span class="require">*</span></label>
                        <input type="text" name="name" class="form_control" placeholder="Product name" value="{{ $product->name }}" required>
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Product Code</label>
                        <input type="number" name="code" class="form_control" placeholder="Product Code" value="{{ $product->code }}">
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Product Catagory <span class="require">*</span></label>
                        <select name="category_id" class="form_control">
                            <option value="" selected>__Catagory__</option>
                            @foreach ($catagory as $item)
                                @if ($product->category_id == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->c_name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->c_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Product Supplier <span class="require">*</span></label>
                        <select name="supplier_id" class="form_control">
                            <option value="" selected>__Supplier__</option>
                            @foreach ($supplier as $item)
                                @if ($product->supplier_id == $item->id)
                                    <option value="{{ $item->id }}" selected>{{ $item->full_name }}</option>
                                @else
                                    <option value="{{ $item->id }}">{{ $item->full_name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Product Root</label>
                        <input type="text" name="root" class="form_control" placeholder="Product Root" value="{{ $product->root }}">
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Buying price <span class="require">*</span></label>
                        <input type="number" name="buying_price" class="form_control" placeholder="Buying Price" value="{{ $product->buying_price }}" required>
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Selling price <span class="require">*</span></label>
                        <input type="number" name="selling_price" class="form_control" placeholder="Selling Price" value="{{ $product->selling_price }}" required>
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Product Quantity <span class="require">*</span></label>
                        <input type="number" name="quantity" class="form_control" placeholder="Product Quantity" value="{{ $product->quantity }}" required>
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Buying Date <span class="require">*</span></label>
                        <input type="date" name="buying_date" class="form_control" placeholder="Buying Date" value="{{ $product->buying_date }}" required>
                    </div>
                </div>
                <div class="col_lg_6">
                    <div class="form_group">
                        <label>Product Image</label>
                        <input type="file" name="image" class="form_control" oninput="preview(this, '#prev_out')">
                    </div>
                </div>
                <div class="col_lg_12">
                    <div class="form_group">
                        <div id="prev_out">
                            <img src="{{ $product->image }}" alt="">
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