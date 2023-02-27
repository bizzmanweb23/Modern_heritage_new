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
<style type="text/css">
    table tr td {
        font-size: 11px;
        width: 100%; 
    }
    p{
        font-size: 11px;
    }
</style>
<body>
    <div class="container text-center">
        <h1 class="text-success">{{$title}}</h1> 
        <p>Employee Name: {{$empName}}</p>
        <p>Designation : {{$designation}}</p>
        <table class="table   table-sm"> 
        <table>
            <tr>
                <td>Logo</td>
                <td>
                    <b>Employee Payslip </b>for [data] <span>to</span> <span>[data]</span>
                </td>
            </tr>
        </table>
        <table class="table   table-sm">
            <tr>
                <td>Emp Id</td><td>[data]</td>
                <td>Date Join</td><td>[data]</td>
            </tr>
             <tr>
                <td>Emp Name</td><td>[data]</td>
                <td>Department</td><td>[data]</td>
            </tr>
             <tr>
                <td>OT Period</td><td>[data]</td>
                <td>Date of Payment</td><td>[data]</td>
            </tr>
             <tr>
                <td> </td><td> </td>
                <td>Mode of Payment</td><td>[data]</td>
            </tr>
        </table>
        <hr>
        <table class="table   table-sm">
            <tr>
                <td>
                    Basic Month 
                </td>
                <td>
                    [data]
                </td>
                <td>
                    Employee CPF
                </td>
                <td>
                    [data]
                </td>
            </tr>
            <tr>
                <td><u>Allowances</u><td></td></td>
                <td><u>Allowances</u><td></td></td>
            </tr>

            <tr>
                <td>
                    Petrol
                </td>
                <td>
                    100
                </td>
                <td>
                    CDAC
                </td>
                <td>
                    000
                </td>
            </tr>

            <tr>
                <td>Performance A</td><td>000</td>
            </tr>
            <tr>
                <td>
                    <u>Overtime</u>
                </td>
            </tr>
            <tr>
                <td>OT15 (20.00 * 18.09)</td><td>000</td>
            </tr>
             <tr>
                <td>OT20 (20.00 * 18.09)</td><td>000</td>
            </tr>
            <tr>
                <td>PH_DAY (20.00 * 18.09)</td><td>000</td>
            </tr>
            <tr>
                <td>Employee CPF</td><td>000</td>
            </tr>
        </table>
<hr>
        <table class="table   table-sm">
            <tr>
                <td>
                    Total Gross Wages
                </td>
                <td>
                    000.00
                </td>
                <td>
                                       <table>
                       <tr>
                        <td>
                            Nett Wages
                        </td>
                        <td>
                            SGD [data]
                        </td>
                       </tr>
                          <tr>
                        <td>
                            CPF Wages
                        </td>
                        <td>
                            SGD [data]
                        </td>
                       </tr>
                          <tr>
                        <td>
                            Total CPF
                        </td>
                        <td>
                            SGD [data]
                        </td>
                       </tr>
                   </table>
                </td>
            </tr>
            <tr>
                <td>
                    Thank you for your hardwork. Please clear Your brough forward leave before end of the year.
                </td>
            </tr>
        </table>

        
        </table>
    </div>
</body>

</html>