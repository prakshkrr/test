@extends('layout.dashboard')

@section('maincontent3')
{{-- session --}}
@if ($message = Session::get('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
  <strong></strong>Color Updated Successfully.
</div>
@endif
{{-- session --}}

<div class="card card-primary">
  <div class="card-header">
    <h3 class="card-title">Edit Color Page</h3>
  </div>
  
  <div class="card-body">
    <div class="d-flex justify-content-end">
      <a href="{{ route('color.index') }}" class="btn btn-outline-primary"><i class="fa fa-exit" aria-hidden="true"></i>Cancel</a>
   </div>
      <form action="{{ url('admin/color/update',[$colors->id]) }}" method="post" enctype="multipart/form-data">
      
      {!! csrf_field() !!}
        <lable id="error" style="display: none;"></lable>
        <label>Color Name</label></br>
        <input type="text" value="{{ $colors->name }}" name="name" id="color_input_name" class="form-control">
        <span style="color: red">@error('name'){{$message}}@enderror</span></br>


        <input type="submit" value="upadte" class="btn btn-outline-primary">
    </form>

  </div>
</div>
@endsection
