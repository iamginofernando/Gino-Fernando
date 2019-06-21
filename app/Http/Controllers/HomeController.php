<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Expense;
use App\ExpenseCategory;
use App\User;
use Response;
use Validator;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = Auth::user()->user_id;
        $expenses = $users = DB::select('select sum(e.amount) as amount, ec.display_name
                                        from expense e, expense_categ ec, users u 
                                        where u.user_id = ? and
                                        u.user_id = e.user_id and
                                        e.expense_categ_id = ec.expense_categ_id
                                        group by ec.expense_categ_id', [$user_id]);
        return Response::json(array(
            'expenses'      => collect($expenses)->toArray()),
            200
        );
    }
}
