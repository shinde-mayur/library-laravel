<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Book;
use App\Student;
use App\DepositBook;
use App\IssueBook;
class ReportController extends Controller
{
    public function index()
    {
    	$issued=IssueBook::latest()->where('return_date','!=','Book returned')->simplePaginate(15);
    	$deposits=DepositBook::latest()->simplePaginate(15);
    	$books=Book::latest()->where('is_issued','!=','1')->simplePaginate(15);
    	return view('report.index',compact('issued','deposits','books'));
    }
}
