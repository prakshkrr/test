@extends('layout.dashboard')

@section('maincontent3')

{{-- session --}}
@if ($message = Session::get('success'))  
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong></strong> You successfully add your Product.
</div> 
@endif  
{{-- session --}}
<style>
    label.error {
        color: #dc3545;
         font-weight: 700;
         display:block;
         padding: 6px 0;
         font-size: 14px;
    }
</style>
 
<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Product</h3>
  </div>
  
  <div class="card-body">
    <div class="d-flex justify-content-end">
      <a href="{{ route('product.index') }}" class="btn btn-outline-primary"><i class="fa fa-exit" aria-hidden="true"></i>Cancel</a>
   </div>
   
   <div class="card-body">

    <form action="{{ route('product.save') }}" method="post" id="form" enctype="multipart/form-data">
      {!! csrf_field() !!}

      <div class="col-md-12">
        <div class="form-group pb-3">
        <label for="name">Product Name<span class="text-danger">*</span></label>
        <input type="text" name="name" id="product_input_name" class="form-control">
        <span style="color: red">@error('product_input_name'){{$message}}@enderror</span>
        </div>

        <div class="form-group pb-3 pt-3">
            <label for="name">Product URL<span class="text-danger">*</span></label>
            <input type="text" name="url" id="product_input_url" class="form-control">
            {{-- <span style="color: red">@error('product_input_url'){{$message}}@enderror</span> --}}
        </div>

        <div class="form-group pb-3">
            <label for="name">Product image<span class="text-danger">*</span></label>
            <br>
            <input type="file" name="image" id="image" class="form-control">
            <span style="color: red">@error('image'){{$message}}@enderror</span>
        </div>

      <div class="form-group pb-3">
        <label for="category_name">Product Category<span class="text-danger">*</span></label>
        <select class="form-select form-control" aria-label="select" name="category" id="category">
        <option value="">select category</option>
          @foreach ($category as $item )
          <option value="{{$item ->id}}">{{$item ->name}}</option>
          @endforeach
       </select>
       <span style="color: red">@error('category'){{$message}}@enderror</span>
      </div>

      <div class="form-group pb-3">
        <label for="color_name">Product Color<span class="text-danger">*</span></label>
        <select class="form-select form-control" aria-label="select" name="color" id="color">
          <option value="">select Color</option>
          @foreach ($colors as $item )
          <option value="{{$item ->id}}">{{$item ->name}}</option>
          @endforeach
       </select>
      <span style="color: red">@error('color'){{$message}}@enderror</span></br>
      </div>
      <label>UPC Code</label></br>
      <input type="text" name="upc" id="upc" class="form-control">
      <span style="color: red">@error('upc'){{$message}}@enderror</span></br>

      <label>Product Description</label></br>
      <textarea name="Description" id="Description" class="form-control"></textarea>
      <span style="color: red">@error('discription'){{$message}}@enderror</span></br>

      <div class="form-group pb-3">
        <label for="name">Product price<span class="text-danger">*</span></label>
      <input type="number" name="price" id="price" class="form-control">
      <span style="color: red">@error('price'){{$message}}@enderror</span>
      </div>

      <div class="form-group pb-3">
        <label for="name">Product Stock<span class="text-danger">*</span></label>
      <input type="number" name="stock" id="stock" class="form-control">
      <span style="color: red">@error('stock'){{$message}}@enderror</span>
      </div>

      <div class="multiple_img_list pb-3">
        <label>Select Multiple Images</label>
        <div class="more_img">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <input type="file" name="subimage[]" class="form-control @error('sub_img') is-invalid @enderror" data-iconname="fa fa-cloud-upload" data-buttonname="btn-secondary" accept="image/*"/>
                        @error('sub_img')
                        <span class="invalid-feedback">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <input class="form-control @error('sort') is-invalid @enderror" name="sort[]" type="text" id="sort" maxlength="2" placeholder="Sort Number">
                        @error('sort')
                            <span class="invalid-feedback" >
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="col-md-4">
                    <button name="add_img"  type="button" class="btn btn-outline-primary add_img">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                    </button>
                    <button  name="remove_img" style="display: none" id="remove_img" type="button" class="btn btn-outline-warning remove_img">
                        <i class="fa fa-minus" aria-hidden="true"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>

      <button type="submit" class="btn btn-outline-primary"><i class="far fa-save"></i>   Save</button>
                                       
  </form>

</div>
</div>
@endsection

@push('custom-script')
<script src="{{asset('resources/assets/common/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('resources/assets/common/js/additional-methods.min.js')}}"></script>
    <script src="{{asset('resources/assets/admin/plugins/select2/js/select2.min.js')}}." type="text/javascript"></script>
    <script src="{{asset('resources/assets/admin/plugins/bootstrap-select/js/bootstrap-select.js')}}" type="text/javascript"></script>
    <script src="{{asset('resources/assets/admin/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js')}}" ></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery-validation-unobtrusive/3.2.12/jquery.validate.unobtrusive.min.js')}}" ></script>
    <script>




$(document).ready(function () {
        $('#product_input_name').change(function (e) {
            e.preventDefault();
    //         var str = $('#product_input_name').val();
    //     if(str == ""){
    // // console.log("contains spaces");
    //         // alert('hello');
    //     }
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

            //sort textbox
            $('.multiple_img_list').on('keypress','#sort',function (e) {
                var keyCode = e.charCode;
                if ( (keyCode != 8 || keyCode ==32 ) && (keyCode < 48 || keyCode > 57)) {
                    return false;
                }
            });

            $(document).ready(function(){
        $("#form").validate({
            ignore: [],
            rules:{
                name:{
                    required:true,
                    maxlength:100
                },
                category:{
                    required:true,
                },
                color:{
                    required:true,
                },
                upc:{
                    required:true,
                    maxlength:12,
                },
                Description:{
                    maxlength:500,
                },
                price:{
                    required:true,
                    maxlength:6
                    },
                stock:{
                    required:true,
                    maxlength:6,
                },
                image:{
                    required:true,
                },
                
            },
            messages:{
                category: {
                required: 'Please! Choose Category'
            },
            color: {
                required: 'Please! Choose Color'
            },
            upc: {
                required: 'Please! Enter The UPC Code',
                maxlength:'The UPC May Not Be Greater Than 12 Digit.',
            },
            name: {
                required: 'Please! Enter The Product Name',
                maxlength:'The Name May Not Be Greater Than 50 Characters.'
            },
            discription:{
                maxlength:'The Description May Not Be Greater Than 500 Characters.'
            },
            price: {
                required: 'Please! Enter The Price',
                maxlength: 'Price Should Not Be Greaterthan 6 Digit'
            },

            stock:{
                required:'Please! Enter The Stock',
                maxlength:'The Stock May Not Be Greater Than 6 Digit.'
            },
            image:{
                required:'Please! Select Image'
            }
            },
        });
    });


</script>

@endpush