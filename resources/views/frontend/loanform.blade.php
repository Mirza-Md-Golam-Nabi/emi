@extends('layouts.app')

@section('maincontent')

@include('msg')

<div class="mt-5">
   <h3 style="text-align: center;">Loan Apply Form</h3>
   <form action="{{ route('loan.store') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="name">Full Name</label>
        <input type="text" class="form-control" required name="name" id="name" placeholder="Enter your full name">
      </div>
      <div class="form-group">
         <label for="mobile">Phone Number</label>
         <input type="text" class="form-control" required name="mobile" id="mobile" placeholder="Enter your phone number">
       </div>
       <div class="form-group">
         <label for="amount">Amount</label>
         <input type="text" class="form-control" required name="amount" id="amount" placeholder="Enter Loan amount">
       </div>
       <div class="form-group">
         <label for="duration">Duration</label>
         <select name="duration" id="duration" required class="form-control">
            <option value="">Please Select One</option>
            <option value="3">3 Months</option>
            <option value="6">6 Months</option>
            <option value="9">9 Months</option>
            <option value="12">12 Months</option>
         </select>
       </div>
       <div class="form-group">
         <label for="interest">Interest rate <small>(Monthly)</small></label>
         <select name="interest" id="interest" required class="form-control">
            <option value="">Please Select One</option>
            <option value="0.83">0.83%</option>
            <option value="0.75">0.75%</option>
            <option value="0.66">0.66%</option>
            <option value="0.58">0.58%</option>
         </select>
       </div>
      <button type="submit" class="btn btn-primary">Apply</button>
    </form>
</div>
    
@endsection