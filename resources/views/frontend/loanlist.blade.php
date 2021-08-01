@extends('layouts.app')

@section('maincontent')

@include('msg')

<div class="mt-5">
   <h3 style="text-align: center;">Loan Apply List</h3>
   <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">S.N</th>
          <th scope="col">Name</th>
          <th scope="col">Mobile</th>
          <th scope="col">Amount</th>
          <th scope="col">Interest Rate</th>
          <th scope="col">Duration</th>
          <th scope="col">Details</th>
        </tr>
      </thead>
      <tbody>
         @php $i=1; @endphp
         @foreach($loanList as $list)
        <tr>
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $list->customer_name }}</td>
          <td>{{ $list->customer_mobile }}</td>
          <td>{{ $list->amount }}</td>
          <td>{{ $list->interest_rate }}%</td>
          <td>{{ $list->duration }} Month</td>
          <td>
             @if($list->loan_status == 0)
             <span class="text-danger">{{ "Pending" }}</span>
             @elseif($list->loan_status == 2)
             <span class="text-danger">{{ "Rejected" }}</span>
             @else
             <span data-toggle="modal" class="loan text-primary" data-target="#loan" data-loanid="{{ $list->id }}" style="cursor: pointer;">{{ "Details" }}</span>
             @endif
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>


    
    <div class="modal fade" id="loan" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalCenterTitle">Loan Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h3 class="text-center">Loan Payment Date</h3>
            <div id="loandetails"></div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>
        </div>
      </div>
    </div>

</div>


    
@endsection