@extends('frontend.admin.layouts.master')

@section('content')
<link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet" />
<link rel="stylesheet" href="http://cdn.datatables.net/responsive/1.0.2/css/dataTables.responsive.css" />

<script src="https://ajax.googleapis.com//ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<h5>Departments</h5>
<div class="row">
    <div class="col-md-4">
        <a href="{{ route('addDepartment') }}" class="btn btn-primary">New Department</a>
    </div>


</div>

<div class="card" style="padding:15px;">

    <form>
        <div class="col-md-6">
            <div class="form-group">


                <div class="col-md-5">
                <select name="status" class="form-control" id="status">
                        <option value="all">All</option>
                        <option value="1" @if(isset($_GET['status']) && $_GET['status']==1 )selected @endif>Active</option>
                        <option value="0" @if(isset($_GET['status']) && $_GET['status']==0 )selected @endif>Inactive</option>
                    </select>
                </div>


            </div>
        </div>
    </form>



    <table class="table table-striped table-hover dt-responsive" cellspacing="0" width="100%" id="tableId">
        <thead>
            <tr>
                <th>Sl#</th>
                <th>Department</th>
                <th>Manager</th>
                <th>Status</th>
                <th>Action</th>



            </tr>
        </thead>
        <tbody>
        @foreach($departments as $key=>$dpt )
            <tr>
                <td style="text-align:center">{{$key+1}}</td>
          
                <td>{{$dpt->department_name }}</td>
                <td>{{$dpt->manager}}</td>
                @if($dpt->status==1)
                <td><span class="badge badge-success">Active</span></td>
                @else
                <td><span class="badge badge-danger">Inactive</span></td>
                @endif
               
                <td>
                    <a href="editDepartment/{{$dpt->id}}"  title="edit"><span class="badge badge-info"><i class="fas fa-edit"></i></span></a>
                    <a href="viewDepartment/{{$dpt->id}}"  title="view"><span class="badge badge-warning"><i class="fa fa-eye" aria-hidden="true"></i></span></a>
                    <a href="javascript:void(0)" onclick="return delete_department(this.id)" id="{{$dpt->id}}" title="delete"><span class="badge badge-danger"><i class="fa fa-trash" aria-hidden="true"></i></span></a>
                </td>

            </tr>
            @endforeach

        </tbody>
    </table>

</div>



<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.js"></script>
<script>
    $(function() {
        $('#tableId').DataTable({
            responsive: true
        });
    });
    $('#status').change(function(e) {
        e.preventDefault();
        var status = $('#status').val();

        $.ajax({
            url: "{{route('departments')}}",
            type: 'GET',
            data: {
                status: status
            },
            success: function(data) {
                location.replace('?status=' + status);

            }
        });


    });
    function delete_department(id) {
        if (confirm('Are you sure you want to delete?')) {

            $.ajax({
            url: "{{route('deleteDepartment')}}",
            type: 'GET',
            data: {
                id: id
            },
            success: function(data) {
           if(data == 1){

            location.reload();
           }

            }
        });
        } else {

            console.log('Thing was not saved to the database.');
        }
    }

    
</script>
@endsection