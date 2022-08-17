@extends('frontend.admin.layouts.master')

@section('content')


<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>






<div class="container card" style="padding:15px;">

    <form>
        <div class="col-md-6">
            <div class="form-group">


                <div class="col-md-3">
                    <select name="time" class="form-control" id="time">
                        <option value="all">All</option>
                        <option value="today" @if(isset($_GET['type']) && $_GET['type']=='today' )selected @endif>Today</option>
                        <option value="past" @if(isset($_GET['type']) && $_GET['type']=='past' )selected @endif>Past</option>
                    </select>
                </div>


            </div>
        </div>
    </form>

    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th></th>
                <th>Driver</th>

                <th>Delivery Details</th>
                <th>Pickup Details</th>
                <th>Expected Date</th>
                <th>Status</th>




            </tr>
        </thead>
        <tbody>
            @foreach($deliveries as $key=>$dv )
            <tr>
                <td>
                    <button class="btn btn-warning btn-sm" id="{{$dv->id}}" onclick="show_modal(this.id)">Update</button>
                </td>

                <td>
                    <div class="d-flex px-2 py-1">
                        <div>
                            @if(isset($dv->emp_image))
                            <img src="{{ asset($dv->emp_image) }}" alt="Product" class="avatar avatar-sm me-3">
                            @else
                            <img src="{{ asset('images/products/default.jpg') }}" alt="Product" class="avatar avatar-sm me-3">
                            @endif
                        </div>

                        {{ $dv->emp_name }}<br>
                        {{ $dv->work_email }}

                </td>

                <td>
                    {{ $dv->delivery_client }}<br>
                    {{ $dv->delivery_add_1 }} {{ $dv->delivery_add_2 }} {{ $dv->delivery_add_3 }}<br>
                    {{ $dv->delivery_state }} {{ $dv->delivery_pin }} {{ $dv->delivery_country }}
                </td>
                <td>
                    {{ $dv->pickup_client }}<br>
                    {{ $dv->pickup_add_1 }} {{ $dv->pickup_add_2 }} {{ $dv->pickup_add_3 }}<br>
                    {{ $dv->pickup_state }} {{ $dv->pickup_pin }} {{ $dv->pickup_country }}
                </td>
                <td>

                    {{ $dv->expected_date }}
                </td>
                @if($dv->status == 1)
                <td><span class="badge badge-warning">Pending</span></td>
                @elseif($dv->status == 2)
                <td><span class="badge badge-success">Completed</span></td>
                @elseif($dv->status == 5)
                <td><span class="badge badge-info">Assign to Driver</span></td>
                @else
                <td><span class="badge badge-danger">Canceled</span></td>
                @endif


            </tr>

            <div class="modal" id="ExtraModal_{{$dv->id}}">
                <div class="modal-dialog">
                    <form method="post" action="{{route('status_update')}}">
                        @csrf
                        <div class="modal-content">
                            <!-- Modal header -->
                            <div class="modal-header">
                                <h4 class="modal-title">Status Update</h4>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                            <!-- Modal body -->
                            <div class="modal-body">
                                <!-- <div class="row mb-2"><h5>Existing Order</h5> -->
                                <div class="row">
                                    <div class="col-md-4" style="display:none"><span>Existing Order</span></div>
                                    <div class="col-md-8" style="display:none">
                                        <div style="display: flex; flex-wrap: no-wrap">
                                            <input type="text" value="{{$dv->id}}" class="form-control mr-1" id="id" name="id">
                                            <input type="text" value="{{$dv->order_id}}" class="form-control mr-1" id="order_id" name="order_id">
                                        </div>
                                    </div>
                                    <div class="col-md-4"><span>Status</span></div>
                                    <div class="col-md-8">
                                        <div style="display: flex; flex-wrap: no-wrap">
                                            <select class="form-control mr-1" name="status" id="status">
                                                @foreach($status as $st)
                                                <option value="{{$st->id}}" @if($st->id == $dv->status) selected @endif>{{$st->order_status}}</option>
                                                @endforeach
                                            </select>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">

                                <button type="submit" class="btn btn-primary">Save</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach


        </tbody>
    </table>

</div>





<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script>
    function show_modal(id) {
        $('#ExtraModal_' + id).modal('show');
    }

    $(function() {
        $('#tableId').DataTable({
            responsive: true
        });
    });

    $('#time').change(function(e) {
        e.preventDefault();
        var type = $('#time').val();

        $.ajax({
            url: "{{route('deliveries')}}",
            type: 'GET',
            data: {
                type: type
            },
            success: function(data) {
                location.replace('?type=' + type);

            }
        });


    });
</script>
@endsection