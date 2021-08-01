<div class="d-flex justify-content-end" style="background-color: #eee; padding:10px;">
   <ul class="nav">
      <li class="nav-item">
         <a href="{{ route('admin.loan.applicant') }}" class="nav-link">Loan Applicant</a>
      </li>
      <li class="nav-item">
         <a href="{{ route('admin.loan.applicant.list') }}" class="nav-link">Applicant List</a>
      </li>
      <li class="nav-item">
         @if(isset(Auth::user()->id) && !empty(Auth::user()->id))
         <a class="nav-link" href="{{ route('logout') }}" style="margin-left: 5px;"
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
         </a>
         <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
         </form> 
      @else
         <a data-target="#login" data-toggle="modal" style="cursor: pointer;">{{ __('Login') }}</a>
      @endif
      </li>
    </ul>
</div>