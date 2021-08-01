<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Loan;
use App\Model\Loandetail;
use DB;
use Auth;

class FrontendController extends Controller
{
    public function loanApply(){
        return view('frontend.loanform');
    }

    public function loanStore(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'mobile' => 'required',
            'amount' => 'required',
            'duration' => 'required',
            'interest' => 'required',
        ]);

        $name = $request->name;
        $mobile = $request->mobile;
        $amount = $request->amount;
        $duration = $request->duration;
        $interest = $request->interest;
        $total_interest = ($amount * $duration * $interest) / 100;
        $monthly_interest = $total_interest / $duration;
        $monthly_principal = ceil($amount / $duration);
        $total_emi = ceil($monthly_principal + $monthly_interest);

        try{
            DB::beginTransaction();

            $loanData = new Loan;
            $loanData->customer_name = $name;
            $loanData->customer_mobile = $mobile;
            $loanData->amount = $amount;
            $loanData->duration = $duration;
            $loanData->interest_rate = $interest;
            $loanData->total_interest = $total_interest;
            $loanData->monthly_interest = $monthly_interest;
            $loanData->monthly_principal = $monthly_principal;
            $loanData->total_emi = $total_emi;
            $loanData->updated_by = 1;
            $loanData->save();

            DB::commit();
        }catch(Exception $e){
            DB::rollback();
        }

        if($loanData){
            session()->flash('success', 'Loan Apply Successfully.');
            return redirect()->route('loan.list');
        }else{
            session()->flash('error', 'Something Error. Please try again.');
            return redirect()->back()->withInput();
        }
    }

    public function loanList(){
        $loanList = Loan::orderBy('id', 'desc')->get();
        return view('frontend.loanlist')->with(['loanList'=>$loanList]);
    }

    public function ordinalSuffix($number){
        $arr = ['st', 'nd', 'rd', 'th'];
        if($number == 1) return $arr[0];
        elseif($number == 2) return $arr[1];
        if($number == 3) return $arr[2];
        else return $arr[3];
    }

    public function loanDetails(Request $request){
        $loanid = $request->get('loanid');
        $loanData = Loandetail::where('loan_id', $loanid)->get();
        $output = '<table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">S.N</th>
            <th scope="col" class="text-center">Title</th>
            <th scope="col" class="text-right">Total Amount</th>
            <th scope="col" class="text-center">Payment date</th>
            <th scope="col" class="text-center">Payment end date</th>
          </tr>
        </thead>
        <tbody>';
        if(count($loanData) > 0){
            $i = 1;
            foreach($loanData as $data){
                $output .= '<tr>
                    <th scope="row">'.$i++.'</th>
                    <td class="text-center">'.($i-1).$this->ordinalSuffix($i-1).'</td>
                    <td class="text-right">'.number_format($data->total_amount, 2).' Tk</td>
                    <td class="text-center">'.$data->payment_date.'</td>
                    <td class="text-center">'.$data->payment_end_date.'</td>
                  </tr>';
            }
        }else{
            $output .= '<tr>            
            <td colspan="5"><h3 class="text-danger text-center">There is no data.</h3></td>
          </tr>';
        }
        $output .= '</tbody></table>';
        return $output;
    }
}
