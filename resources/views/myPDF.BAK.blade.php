<!DOCTYPE html>
<html lang="en">

<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS library -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- jQuery library -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>

    <!-- JavaScript library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>

    <!-- Latest compiled JavaScript library -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>
</head>

<body>
    <div class="container text-center">
        <h1 class="text-success">{{$title}}</h1><br><br>
        <p>Employee Name: {{$empName}}</p>
        <p>Designation : {{$designation}}</p>
        <table class="table table-bordered">

            <tbody>
                <tr> 
                    <td>Per Trip Charge</td>
                    <td>{{$per_trip_charge}}</td> 
                </tr>
                <tr> 
                    <td>No of Trip (in the month of {{$month}})</td>
                    <td>{{$no_trip}}</td>  
                </tr>
                <tr>
                    <td>
                        Basic Salary
                    </td>
                    <td>
                       {{ $basic_salary}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Leave Pay
                    </td>
                    <td>
                        {{ $leave_pay}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Bonus
                    </td>
                    <td>
                        {{$bonus}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Cpf
                    </td>
                    <td>
                        {{ $cpf}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Unpaid Leave
                    </td>
                    <td>
                        {{$unpaid_leave}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Less Pop Course
                    </td>
                    <td>
                        {{$less_pop_over}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Commission
                    </td>
                    <td>
                        {{$commission}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Incentives
                    </td>
                    <td>
                        {{$incentives}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Total Earnings
                    </td>
                    <td>
                        {{$earning}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Total Deductions
                    </td>
                    <td>
                        {{$deduction}}
                    </td>
                </tr>
                <tr>
                    <td>
                        Net Pay
                    </td>
                    <td>
                        {{$net_pay}}
                    </td>
                </tr>
                
                <tr>  
                    <td style="text-align:right">Total</td>
                    <td>{{$total}}</td>  
                </tr> 
            </tbody>
        </table>
    </div>
</body>

</html>