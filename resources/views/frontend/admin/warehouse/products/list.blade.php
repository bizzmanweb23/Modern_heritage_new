@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<div class="container card" style="padding:15px;">

<div class="row">
    <div class="col-md-4">
        <a href="{{ route('addProductStock') }}" class="btn btn-primary">Add Stock</a>
    </div>


</div>


    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Product Name</th>
                <th>Barcode</th>
                <th>Status</th>
            
             
                <th>Action</th>


            </tr>
        </thead>
        <tbody>
        @foreach($data as $key=>$pro )
            <tr>
                <td style="text-align:center">{{$key+1}}</td>
                
                <td>{{$pro->product_name}}</td>
                <td>
                <a href="data:image/png;base64,{{DNS1D::getBarcodePNG($pro->sku, 'C39',1,55,array(0,0,0), true)}}" title="download" download>
                <img src="data:image/png;base64,{{DNS1D::getBarcodePNG($pro->sku, 'C39',1,55,array(0,0,0), true)}}" alt="barcode" />
   
                 </a>

                </td>
                @if(intval($pro->min_stock) > intval($pro-> avl_stock))
                <td>
                <span class="badge badge-danger"> unavailable</span>
                </td>
                @else
                <td>
                <span class="badge badge-warning">available</span>
                </td>
                @endif
            
          
                <td>
                    <a href="editWarePro/{{$pro->id}}"  title="edit"><span class="badge badge-info"><i class="fas fa-edit"></i></span></a>
                    <a href="viewWarePro/{{$pro->id}}"  title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                   
                </td>

            </tr>
            @endforeach

        </tbody>

    </table>

</div>




<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>

<script>
    function delete_warehouse(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
                url: "{{route('deleteWarehouse')}}",
                type: 'GET',
                data: {
                    id: id
                },
                success: function(data) {
                    if (data == 1) {

                        location.reload();
                    }

                }
            });
        } else {

            console.log('Thing was not saved to the database.');
        }
    }
    $(function() {
        $('#tableId').DataTable({
            responsive: true
        });
    });

    $('#status').change(function(e) {
        e.preventDefault();
        var status = $('#status').val();

        $.ajax({
            url: "{{route('colors')}}",
            type: 'GET',
            data: {
                status: status
            },
            success: function(data) {
                location.replace('?status=' + status);

            }
        });


    });
</script>

@endsection