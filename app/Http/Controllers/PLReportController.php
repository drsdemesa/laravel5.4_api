<?php

namespace App\Http\Controllers;

use App\Invoice;
use App\Expenditure;

use Illuminate\Http\Request;

class PLReportController extends Controller
{
    public function index(){
    	$invoices = Invoice::all();
    	$expenditures = Expenditure::all();
    	$totalInvoices = 0;

    	// foreach($invoices as $invoice){
    	// 	$totalInvoices += $invoice->item_amt;
    	// }
    	// foreach($expenditures as $Expenditure){
    	// 	$totalExpenditures += $Expenditure->exp_amt;
    	// }

    	// $total = [$totalInvoices, $totalExpenditures];
    	// return view('report', compact('invoices') );
    	return view('report', 
    	array
		    (
		        'invoices'    =>  $invoices,
		        'expenditures'  =>  $expenditures
		        // 'total'  =>  $total
		    )
		 );

    }
}
