@extends('frontend.admin.layouts.master')

@section('content')

<form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        @if(Session::has('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong> {{ Session::get('message') }}</strong>

        </div>
        @endif
        <div class="card">
            <div class="card-body">
                <h5>Update Profile</h5>
                <input type="hidden" class="form-control" id="id" name="id" value="{{$data->userId}}">
                <div class="row mt-1">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$data->user_name}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>User Image</label>
                            <input type="file" class="form-control" id="user_image" name="user_image" >
                            <input type="hidden" class="form-control" id="user_old_image" name="user_old_image" value="{{$data->user_image}}">
                            <br>
                            <img src="{{ asset($data->user_image) }}" alt="User Image" style="height: 6rem; width:6rem">
                        </div>
                    </div>
               

                </div>

                <div class="row mt-1">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$data->email}}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Mobile:</label>
                            <input type="text" class="form-control" value="{{$data->mobile}}" id="mobile" name="mobile"  maxlength="10" oninput="this.value=this.value.replace(/[^0-9]/g,'')">
                        </div>
                    </div>
                </div>


                <hr>

                <div class="row mt-1">
                    <h5>Address Details</h5>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address Line 1</label>
                            <input type="text" class="form-control" value="{{$data->address_1}}" id="address_1" name="address_1">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address Line 2</label>
                            <input type="text" class="form-control" value="{{$data->address_2}}" id="address_2" name="address_2">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Address Line 3</label>
                            <input type="text" class="form-control" value="{{$data->address_3}}" id="address_3" name="address_3">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Country</label>
                            
                            <select name="country" class="form-control" id="country" >
                                <option value="">--Select--</option>
                                @foreach($countries as $c)
                                <option value="{{ $c->id }}" @if($c->id == $data->country) selected @endif>{{ $c->country }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">State</label>
                            <input type="text" class="form-control" value="{{$data->state}}" id="state" name="state">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">Zipcode</label>
                            <input type="text" class="form-control" value="{{$data->zipcode}}" id="zipcode" name="zipcode" maxlength="6" oninput="this.value=this.value.replace(/[^0-9]/g,'')" >
                        </div>
                    </div>

                </div>



                <div class="ms-auto text-end">
                    <button class="btn btn-primary" id="save">Update</button>

                </div>




            </div>
        </div>
    </div>
</form>

<script>
  $('#country').select2({
        width: '100%',
        height:'150px',
        placeholder: "Select a Country",
        allowClear: true
    });
    </script>





@endsection