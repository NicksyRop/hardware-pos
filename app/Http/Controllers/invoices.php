<?php

namespace App\Http\Controllers;
// use LaravelDaily\Invoices\Invoice;
// use LaravelDaily\Invoices\Classes\Buyer;
// use LaravelDaily\Invoices\Classes\Party;
// use LaravelDaily\Invoices\Classes\InvoiceItem;
use ConsoleTVs\Invoices\Classes\Invoice;

use Illuminate\Http\Request;

class invoices extends Controller
{
    function index(){
    	$time=date()
$invoices=Invoice::make()
->addItem('Orion Paints',30,2 ,40)
->number(1234)
->with_pagination(true)
->duplicate_header(true)
->due_date(Carbon::now()->addMonths(1))
->notes('Thanks for choosing us')
->customer([
	'name'=>'warui customer',
	'id'=>'1234567',
])
->save("C:/Users/Admin/Downloads/".->customer(['name'=>'warui kinyuru']))
return $invoices;
    }
}
