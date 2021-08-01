@extends('admin.layouts.app')

@section('maincontent')

<div class="mt-5">
   <h2 style="text-align: center;" class="mb-4">Loan Applicant</h2>
   <div class="mt-2 mb-2">
    @include('msg')
   </div>
   <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">S.N</th>
          <th scope="col">Full Name</th>
          <th scope="col">Mobile</th>
          <th scope="col">Amount</th>
          <th scope="col">Interest</th>
          <th scope="col">Duration</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
         @php $i=1; @endphp
         @foreach ($loanList as $list)
        <tr>
          <th scope="row">{{ $i++ }}</th>
          <td>{{ $list->customer_name }}</td>
          <td>{{ $list->customer_mobile }}</td>
          <td>{{ number_format($list->amount, 2) }}</td>
          <td>{{ number_format($list->interest_rate, 2) }}%</td>
          <td>{{ $list->duration }} Month</td>
          <td>
             <a href="{{ route('loan.approve', $list->id) }}">Approve</a> ||
             <a href="{{ route('loan.reject', $list->id) }}">Reject</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
</div>

@endsection