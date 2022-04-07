@extends('layout.dashboard')

@section('maincontent')

{{-- session --}}
@if ($message = Session::get('success'))  
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong></strong> You successfully add your color.
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
    <h3 class="card-title">Color</h3>
  </div>
  
  <div class="card-body">
    <div class="d-flex justify-content-end">
      <a href="{{ route('color.index') }}" class="btn btn-outline-primary"><i class="fa fa-exit" aria-hidden="true"></i>Cancel</a>
   </div>
   

      <form action="{{ route('color.add') }}" method="post" id="form">
        {!! csrf_field() !!}
           
        <div class="form-group pb-3">
          <label for="category_name">color name<span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control">
        <span style="color: red">@error('name'){{$message}}@enderror</span>
        </div>
        {{-- <label>Status</label></br>
         <input type="radio" id="html" name="status" value="active">
         <label for="html">Active</label>
         <input type="radio" id="css" name="status" value="inactive">
         <label for="css">InActive</label>
         {{-- <span style="color: red">@error('status'){{$message}}@enderror</span> --}}
         <br>
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
$(document).ready(function(){
  $("#form").validate({
      ignore: [],
      rules:{
          name:{
              required:true,
              minlength:3,
              maxlength:10,
             
          },       
      },
      messages:{
      name: {
          required: 'Please! Enter Color Name',
          minlength:'The Name May Not Be Less Than 3 Characters.',
          maxlength:'The Name May Not Be Greater Than 10 Characters.'
          
          
      },
    
      },
  });
});


</script>
@endpush