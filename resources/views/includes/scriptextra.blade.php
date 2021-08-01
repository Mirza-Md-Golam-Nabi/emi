<script>

  $(document).ready(function(){

    $("#mobileNumber").on('keyup', function(){
      var mobileNumber = document.getElementById('mobileNumber').value.length;
      if(mobileNumber == 11){
        document.getElementById('loginSubmitButton').disabled = false;
      }else{
        document.getElementById('loginSubmitButton').disabled = true;
      }
    });

    $("#mobile").on('keyup', function(){
      var mobileNumber = document.getElementById('mobile').value.length;
      if(mobileNumber == 11){
        document.getElementById('register').disabled = false;
      }else{
        document.getElementById('register').disabled = true;
      }
    });

    $('.loan').click(function(){
        var loan = $(this).data('loanid');
        if(loan != ''){
          $.ajax({ 
              url: "{{ route('loan.details') }}?loanid=" + loan,
              method: 'GET',
              success: function(data) {
                  $('#loandetails').html(data);
              }
          });
        }
    });

  });
  
 </script>