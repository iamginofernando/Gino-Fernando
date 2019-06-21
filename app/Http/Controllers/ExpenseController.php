<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Expense;
use App\ExpenseCategory;
use App\User;

use Response;
use Validator;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::user()->user_id;
        $expenses = Expense::where('user_id', $user_id)->with('getCategory')->get();
        $expensecategories = ExpenseCategory::all();

        return Response::json(array(
            'expenses'      => collect($expenses)->toArray(),
            'expensecategories'      => collect($expensecategories)->toArray()),
            200
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user_id = Auth::user()->user_id;

        $validator = Validator::make($request->all(), [
            'manage_expense_category' => 'required',
            'manage_expense_amount' => 'required',
            'manage_expense_entry' => 'required',
            'manage_expense_description' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'Please provide all the details'),
                200
            );
        }
        
        $expense                        = new Expense;
        $expense->user_id               = $user_id;
        $expense->expense_categ_id      = $request->manage_expense_category;
        $expense->amount                = $request->manage_expense_amount;
        $expense->entry_date            = $request->manage_expense_entry;
        $expense->description           = $request->manage_expense_description;
        $expense->save();

        return Response::json(array(
            'expense'      => collect($expense)->toArray(),
            'status'    => true),
            200
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expense = Expense::find($id);


        return Response::json(array(
            'expense'      => collect($expense)->toArray()),
            200
        );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $expense                   = Expense::find($id);

        $validator = Validator::make($request->all(), [
            'manage_expense_category' => 'required',
            'manage_expense_amount' => 'required',
            'manage_expense_entry' => 'required',
            'manage_expense_description' => 'required',
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'Please provide all the details'),
                200
            );
        }

        $expense->amount                = $request->manage_expense_amount;
        $expense->expense_categ_id      = $request->manage_expense_category;
        $expense->entry_date            = $request->manage_expense_entry;
        $expense->description           = $request->manage_expense_description;
        $expense->save();

        return Response::json(array(
            'user'      => collect($expense)->toArray(),
            'status'    => true),
            200
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = Expense::find($id);
        $expense->delete();

        return Response::json(array(
            'status'    => true),
            200
        );
    }
}
