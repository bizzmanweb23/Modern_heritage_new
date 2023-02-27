@extends('frontend.admin.layouts.master')

@section('content')
<style>
.input-symbol-euro {
    position: relative;
}
.input-symbol-euro input {
    padding-left:18px;
}
.input-symbol-euro:before {
    position: absolute;
    top: 7px;
    content:"$";
    left: 5px;
}
</style>
<div class="content-wrapper card">
    <div class="content-header row">
    </div>
    <div class="content-body card-body">
        <form action="{{route('postSalary')}}" method="POST">
            @csrf
            <div class="row">

                <div class="form-group col-md-6">
                    <label>Employee</label>

                    <select name="emp_id" id="emp_id" class="form-control" required>
                        <option value="">--Select-- </option>
                        @foreach($employee as $key=>$emp )
                        <option value="{{$emp->id}}">{{$emp->emp_name}} </option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label>Designation</label>

                    <select name="designation" id="designation" class="form-control" onChange="chk_fields(this.value)" required>
                        <option value="">--Select-- </option>
                        @foreach($job_position as $key=>$j_pos )
                        <option value="{{$j_pos->id}}">{{$j_pos->position_name}} </option>
                        @endforeach

                    </select>
                </div>
                <div class="row" id="normal_employee">
                    <h5>Earnings</h5>
                    <div class="form-group col-md-6">
                        <label>Basic Pay</label><br>
                        <span class="input-symbol-euro"></span>
                        <input type="text" class="form-control basic_pay" id="basic_pay" name="basic_pay" onkeyup="calcSalary()" min="0" step="any">
                        
                        <label for="">Leave Pay</label>
                        <input type="text" class="form-control leave_pay" name="leave_pay">

                        <label for="">Bonus</label>
                        <input type="text" class="form-control bonus_pay" name="bonus">
                    </div>
                   <div class="col-md-6">
                        <div class="row"> 
                                <h5>Deductions</h5> 
                                <div class="form-group col">
                                    <label>CPF</label><br>  
                                    <span class="input-symbol-euro"></span>  
                                    <input type="text" class="form-control cpf" id="cpf" name="cpf" > 
                                </div>
                                <div class="form-group col">
                                    <label>Unpaid Leave</label><br>  
                                    <span class="input-symbol-euro"></span>
                                    <input type="text" name="unpaid_leave" class="form-control unpaid_leave"  >  
                                </div>
                                <div class="form-group col">
                                    <label>Less Pop Over</label><br>
                                    <span class="input-symbol-euro"></span>
                                    <input type="text" class="form-control less_pop_over"  name="less_pop_over" >  
                                </div>  
                        </div>
                   </div>
                   <div class="row"> 
                        <h5>
                            Additional
                        </h5>
                        <div class=" "> 
                            <div class="form-group col">
                                <label>Commission</label><br>
                               
                                <span class="input-symbol-euro"></span>
                                <input type="text" class="form-control commission" name="commission"  >
                            </div>
                            <div class="form-group col">
                                <label>Incentives</label><br>
                                
                                <span class="input-symbol-euro"></span>
                                <input type="text" class="form-control incentives" name="incentives" >
                            </div>
                        </div>
                   </div>
                    <!-- <div class="form-group col-md-6">
                        <label>Insurance</label><br>
                        <input type="hidden" name="esi" value="{{$pay_structures->insurance}}" id="esi">
                        <span class="input-symbol-euro"></span>
                        <input type="text" class="form-control" id="insurance" name="insurance" >
                    </div> -->
                    <!-- <div class="form-group col-md-6">
                        <label>Medical Allowance</label><br>
                        <input type="hidden" name="ma" value="{{$pay_structures->medical_allowance}}" id="ma">
                        <span class="input-symbol-euro"></span>
                        <input type="text" class="form-control" id="medical_allowance" name="medical_allowance" >
                    </div> -->
                    <!-- <div class="form-group col-md-6">
                        <label>Medical Leave Entitlement</label><br>
                        <input type="hidden" name="mle" value="{{$pay_structures->medical_leave_entitlement}}" id="mle">
                        <span class="input-symbol-euro"></span>
                        <input type="text" class="form-control" id="medical_leave_entitlement" name="medical_leave_entitlement" >
                    </div> --> 
                <div class="row">
                    <div class="form-group col-md-6">
                            <label>Total Earning</label><br>
                            <span class="input-symbol-euro"></span>
                            <input type="text" class="form-control total_earnings" id="earning" name="earning" >
                        </div>
                        <div class="form-group col-md-6">
                            <label>Total Deduction</label><br>
                            <span class="input-symbol-euro"></span>
                            <input type="text" class="form-control total_deduction" id="deduction" name="deduction" >
                        </div>
                        <div class="form-group col-md-6">
                            <label>Net Pay</label><br>
                            <span class="input-symbol-euro"></span>
                            <input type="text" class="form-control net_pay" id="net_pay" name="net_pay" >
                        </div>
                    </div>
                </div>
                <div class="row" id="driver">
                    <div class="form-group col-md-6">
                        <label>Per Trip Charge</label>
                        <span class="input-symbol-euro"></span>
                        <input type="text" class="form-control" id="per_trip_charge" name="per_trip_charge"  >
                    </div>
                    <div class="form-group col-md-6">
                        <label>No of Trip (this month)</label>
                        <input type="text" class="form-control" id="no_trip" name="no_trip"  >
                    </div> 
                </div> 
                <br> <br>
                <div class="ms-auto text-end">
                    <button type="submit" class="btn btn-primary">Save</button> 
                    <a href="{{route('salaryEmployee')}}" class="btn btn-info">Back</a>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $('#normal_employee').hide();
    $('#driver').hide();
     

    function chk_fields(value)
    {
       if(value == 1)
       {
        $('#driver').show();
        $('#normal_employee').hide();
       }
       else
       {
        $('#driver').hide();
        $('#normal_employee').show();
       } 
    
    }
    
    $('body').keyup(function(){
       
        var basic_pay = $('.basic_pay').val();
        var leave_pay = $('.leave_pay').val();
        var bonus_pay = $('.bonus_pay').val(); 

        var total_salary = parseFloat(basic_pay) + parseFloat(leave_pay) + parseFloat(bonus_pay);
         
        
        var cpf = $('.cpf').val();
        var unpaid_leave = $('.unpaid_leave').val();
        var less_pop_over = $('.less_pop_over').val();
        
        var total_deductions = parseFloat(cpf) + parseFloat(unpaid_leave) + parseFloat(less_pop_over);
        

        var commission = $('.commission').val();
        var incentives = $('.incentives').val();
        
        var additional = parseFloat(commission)+parseFloat(incentives);
        

       $('.total_earnings').val(parseFloat(total_salary) + parseFloat(commission) + parseFloat(incentives));
       $('.total_deduction').val(total_deductions);
       $('.net_pay').val(parseFloat(commission)+parseFloat(incentives));

       var net_salary = 0;
       net_salary = (parseFloat(total_salary) + parseFloat(commission) + parseFloat(incentives) * parseFloat(cpf))/100;

       $('.net_pay').val(net_salary);


    });

    $('body').on('keyup', '#medical_leave_entitlement',function(){
        //alert('hello');
        var basicPay = $('#basic_pay').val();
        var commission = $('#commission').val();
        var insurance = $('#insurance').val();
        var medical_allowance = $('#medical_allowance').val();
        var medical_leave_entitlement = $('#medical_leave_entitlement').val();
        const total = parseInt(basicPay)+parseInt(commission)+parseInt(insurance)+parseInt(medical_allowance)+parseInt(medical_leave_entitlement);
        //alert(total);
        
        $('#earning').val(total);
    });
    
    $('body').on('keyup','#cpf',function(){
        const CPF = $('.provident_fund').val();
        const totalEarning= $('.total_earning').val();
        const netEarning = parseInt(totalEarning)/100*parseInt(CPF);
        //alert(netEarning);
        $('#deduction').val(netEarning);
        const getPay = parseInt(totalEarning)-parseInt(netEarning);
        $('#net_pay').val(getPay)
        
    });
   
   
    // function calcSalary() {

    //     const basic_pay = parseInt(document.getElementById('basic_pay').value);
    //     const da = document.getElementById("da").value;
    //     const pf = document.getElementById("pf").value;
    //     const esi = document.getElementById("esi").value;
    //     const ma = document.getElementById("ma").value;
    //     const mle = document.getElementById("mle").value;
    //     //alert(da);

    //     // const DA = basic_pay * da;
    //     // const MA = basic_pay * ma;
    //     // const MLE = basic_pay * mle;
    //     // const GrandPay = basic_pay + DA + MA + MLE;
    //     // const PF = GrandPay * pf;
    //     // const EmployeesStateInsurance = GrandPay * esi;
    //     // const Deduction = EmployeesStateInsurance + PF;
    //     // const NetPay = GrandPay - Deduction;

    //     //alert(NetPay);

    //     if (!isNaN(basic_pay)) {
    //         document.getElementById('commission').value = DA;
    //         document.getElementById('cpf').value = PF;
    //         document.getElementById('insurance').value = EmployeesStateInsurance;
    //         document.getElementById('medical_allowance').value = MA;
    //         document.getElementById('medical_leave_entitlement').value = MLE;
    //         document.getElementById('earning_a').value = GrandPay;
    //         document.getElementById('net_pay').value = NetPay;
    //         document.getElementById('deduction').value = Deduction;
    //     }
    // }
</script>
<script>
    @if($errors -> any())
    @foreach($errors -> all() as $error)
    toastr.options = {
        "closeButton": true,
        "progressBar": true
    }
    toastr.success("{{ $error }}");
    @endforeach
    @endif
</script>

@endsection