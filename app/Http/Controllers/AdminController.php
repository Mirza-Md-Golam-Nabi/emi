<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Model\Loan;
use App\Model\Loandetail;
use DB;
use Auth;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }

    public function loanApplicant(){
        $loanList = Loan::where('loan_status', 0)->get();
        return view('admin.loanapplicant')->with(['loanList'=>$loanList]);
    }

    public function loanApprove($loanid){
        $loanData = Loan::where('id', $loanid)->first();

        try {
            DB::beginTransaction();
            
            for($i = 0; $i < $loanData->duration; $i++){
                $loanDetails = new Loandetail;
                $loanDetails->loan_id = $loanid;
                $loanDetails->total_amount = $loanData->total_emi;
                $loanDetails->payment_date = date('d-m-Y', strtotime($i.' month'));
                $loanDetails->payment_end_date = date('d-m-Y', strtotime(($i+1).' month'));
                $loanDetails->updated_by = Auth::user()->id;
                $loanDetails->save();
            }

            $loanData->loan_status = 1;
            $loanData->save();

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        if($loanDetails){
            session()->flash('success', 'Loan Approve Successfully');
        }else{
            session()->flash('error', 'Something Error. Please try again');
        }
        return redirect()->back();
    }

    public function loanReject($loanid){
        try {
            DB::beginTransaction();

            $update = DB::table('loan')->where('id', $loanid)->update(['loan_status'=>2, 'updated_by'=>Auth::user()->id]);

            DB::commit();
        } catch (Exception $e) {
            DB::rollback();
        }

        if($update){
            session()->flash('success', 'Loan Rejected successfully.');
        }else{
            session()->flash('error', 'Something Error. Please try again.');
        }
        return redirect()->back();
    }

    public function loanApplicantList(){
        $loanList = Loan::orderBy('id', 'desc')->get();
        return view('admin.loanapplicantlist')->with(['loanList'=>$loanList]);
    }
}
