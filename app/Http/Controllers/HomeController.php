<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\IssueDepositRequest;
use App\IssueBook;
use App\DepositBook;
use App\Student;
use App\Book;
use DateTime;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function issueDeposit(IssueDepositRequest $request){
        // $validated = $request->validated();
        // print_r($validated);
        $issue_book=new IssueBook; 
        $depo_book=new DepositBook;
        $request->all();
        // print_r($request);
        $book_action = $request->input('book_action');
        $user_id=$request->input('user_id');
        $book_id=$request->input('book_id');
        if (!HomeController::studExist($user_id)) {
            return redirect('home')->with('error', 'Student with ID '.$user_id.' does not exist.'); 
        }
        if (!HomeController::bookExist($book_id)) {
            return redirect('home')->with('error', 'Book with ID '.$book_id.' does not exist.'); 
        }
        switch ($book_action) {
            case 'issue':
                if(HomeController::recordExist($user_id,$book_id)){
                    $msg='Book '.$book_id.' already issued to Student '.$user_id; 
                    return redirect('home')->with('error', $msg); 
                }
                $return_date=date('Y-m-d', strtotime( ' + 7 days'));
                $issue_book->user_id=$user_id;
                $issue_book->book_id=$book_id;
                $issue_book->return_date=$return_date;
                $issue_book->save();
                Book::where('book_id','=',$book_id)
                    ->update(['is_issued'=>'1']);
                $msg= 'Book with ID '.$book_id.' issued to Student '.$user_id.' and return date is '.date('Y-m-d', strtotime( ' + 7 days'));
                return redirect('home')->with('status', $msg);
                break;
            case 'deposit':
                if (!HomeController::recordExist($user_id,$book_id)) {
                    $msg='Book '.$book_id.' is not issued to Student '.$user_id; 
                    return redirect('home')->with('error', $msg); 
                } else{
                    $depo_book->user_id=$user_id;
                    $depo_book->book_id=$book_id;
                    $date1 = new DateTime(IssueBook::where([
                    ['user_id', '=', $user_id],
                    ['book_id', '=', $book_id],
                    ['return_date','!=','Book returned'],
                    ])->value('return_date'));
                    $depo_book->delay=HomeController::delayCal($date1);
                    $depo_book->save();
                    IssueBook::where([
                    ['user_id', '=', $user_id],
                    ['book_id', '=', $book_id],
                    ])->update(['return_date'=>'Book returned']);
                    Book::where('book_id','=',$book_id)
                    ->update(['is_issued'=>'0']);
                    $msg='Book with ID '.$book_id.' deposited from Student '.$user_id;
                    return redirect('home')->with('status',$msg);
                }                
             break;
            default:
                break;
        }
    }
    public function recordExist($user_id,$book_id)
{
    if (IssueBook::where([
                    ['user_id', '=', $user_id],
                    ['book_id', '=', $book_id],
                    ['return_date','!=','Book returned'],
                    ])->count() > 0) {
        return true;
                                }
                                else{
                                    return false;
                                }
}

public function studExist($id)
{
    if (Student::where('stud_id','=',$id)->count()>0) {
        return true;
    } else {
        return  false;
    }
    
}
public function bookExist($id)
{
    if (Book::where('book_id','=',$id)->count()>0) {
        return true;
    } else {
        return  false;
    }
    
}
public function delayCal($date1)
{
    $date2 = new DateTime(date("Y-m-d"));
                    $interval = $date1->diff($date2);
                    $delay=$interval->format("%r%a");
                    if($delay<0){
                        return abs($delay).' Days early';
                    }elseif ($delay>=0) {
                        return abs($delay).' Days late';
                    }
}

}
