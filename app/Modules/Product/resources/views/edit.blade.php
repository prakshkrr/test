@extends('layout.dashboard')

@section('maincontent3')
{{-- session --}}
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong></strong>Product Updated Successfully.
</div>
@endif
{{-- session --}}

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Product Page</h3>
  </div>
  
  <div class="card-body">
    <div class="d-flex justify-content-end">
      <a href="{{ route('product.index') }}" class="btn btn-outline-primary"><i class="fa fa-exit" aria-hidden="true"></i>Cancel</a>
   </div>
      <form action="{{ url('/admin/product/update',[$product->id]) }}" method="post" enctype="multipart/form-data">
      
      {!! csrf_field() !!}
        <lable id="error" style="display: none;"></lable>
        <label>Product Name</label></br>
        <input type="text" value="{{ $product->name }}" name="name" id="product_input_name" class="form-control">
        <span style="color: red">@error('name'){{$message}}@enderror</span></br>

        <label>URL</label></br>
        <input type="url"value="{{ $product->url }}" name="url" id="product_input_url" class="form-control" value="" readonly="">
        <span style="color: red">@error('url'){{$message}}@enderror</span></br>

        <label> Product Image</label></br>
        <input type="file" name="image" id="image" class="form-control">
        <span style="color: red">@error('image'){{$message}}@enderror</span></br>
        <img src="{{ asset('uploads/products/'.$product->image) }}" width="170px" height="100px" alt="image"><br>

        <label>Category</label></br>
        <select class="form-select form-control">
            <option value="">{{$product->category->name}}</option>

        </select>
        <span style="color: red">@error('category'){{$message}}@enderror</span></br>

        <label>Color</label></br>
        {{-- <input type="text" name="colour" id="colour" class="form-control"> --}}
        <select class="form-select form-control" >
            <option value="">{{$product->color->name}}</option>

        </select>
        <span style="color: red">@error('color'){{$message}}@enderror</span></br>

        <label>UPC Code</label></br>
        <input type="text"  value="{{ $product->upc }}" name="upc" id="upc" class="form-control" readonly="">
        <span style="color: red">@error('upc'){{$message}}@enderror</span></br>

        <label>Product Description</label></br>
        <textarea name="Description"   id="Description" class="form-control"> {{ $product->discription }}</textarea>
        <span style="color: red">@error('discription'){{$message}}@enderror</span></br>

        <label>Price</label></br>
        <input type="number"  value="{{ $product->price }}" name="price" id="price" class="form-control">
        <span style="color: red">@error('price'){{$message}}@enderror</span></br>

        <label>Stock</label></br>
        <input type="number"   value="{{ $product->stock }}" name="stock" id="stock" class="form-control">
        <span style="color: red">@error('stock'){{$message}}@enderror</span></br>

        <div class="multiple_img_list pb-3">
            <label> Multiple Images</label>
            @foreach($images as $image)
                <div class="more_img">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="row">
                                <div class="col-md-10">
                                    <div class="form-group">
                                        <input type="file" name="sub_img[]"  onchange="readURLSubimg(this);"  class="form-control moreImgInp @error('sub_img') is-invalid @enderror" data-iconname="fa fa-cloud-upload" data-buttonname="btn-secondary" accept="image/*"/>
                                        <input class="form-control  @error('img_id') is-invalid @enderror img_id" value="{{$image->id}}" name="img_id[]" type="hidden">
                                        @error('sub_img')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <img alt="Product image" id="sub_image" src="{{ url('uploads/products/'.$image->image)}}"  class="img-thumbnail sub_image"><br>
                                   
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input class="form-control  @error('sort') is-invalid @enderror" value="{{$image->sort}}" name="sort[]" type="text" id="sort" maxlength="2" onkeypress="if(this.value.length==2);" placeholder="Sort Number" id="{{$image->id}}">
                                @error('sort')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <button name="add_img" id="add_img" type="button" class="btn btn-outline-primary add_img">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                            </button>
                            <button name="remove_img" id="{{$image->id}}" type="button" class="btn btn-outline-warning remove_img">
                                <i class="fa fa-minus" aria-hidden="true"></i>
                            </button>

                        </div>
                    </div>
                </div>
            @endforeach
            <div class="more_img" style="display:none">
                <div class="row">
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <input type="file" name="sub_img[]"  class="form-control @error('sub_img') is-invalid @enderror" data-iconname="fa fa-cloud-upload" data-buttonname="btn-secondary" accept="image/*"/>
                                    @error('sub_img')
                                    <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-2">
                                <img alt="Product Image" id="sub_image" class="img-thumbnail sub_image">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <input class="form-control @error('sort') is-invalid @enderror" value="" name="sort[]" type="text" id="sort" maxlength="2" onkeypress="if(this.value.length==2);" placeholder="Sort Number">
                            @error('sort')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button name="add_img" id="add_img" type="button" class="btn btn-outline-primary add_img">
                            <i class="fa fa-plus" aria-hidden="true"></i>
                        </button>
                        <button name="remove_img"  id="remove_img" type="button" class="btn btn-outline-warning remove_img" style="display: none">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>


        <input type="submit" value="upadte" class="btn btn-outline-primary">
    </form>

  </div>
</div>
@endsection

@push('custom-script')
<script>
    $(document).ready(function () {

        $('#product_input_name').change(function (e) {
            e.preventDefault();
        //    var str = $('#product_input_name').val();
       // if(str == ""){
    // console.log("contains spaces");
            // alert('hello');

        //}
            var url = '' ;

            let text1 =   $(this).val();
                let text2 = text1.split(" ").join("");
            url += text2;
            console.log(url);
            $('#product_input_url').val(`${url}`);

        });
    });

    $('.multiple_img_list').on('click','.add_img',function () {
                $(this).closest('.more_img').clone().find('input').val('').end().insertAfter($(this).closest('.more_img'));
                if ($(".multiple_img_list >div").length != 1){
                    $('.remove_img').show();
                }
            });
            $('.multiple_img_list').on('click','#remove_img',function () {
                if ($(".multiple_img_list >div").length > 1){
                    $(this).closest('.more_img').remove();
                }
                if ($(".multiple_img_list >div").length == 1){
                    $('.remove_img').hide();
                }
            });

</script>

@endpush
