<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Expense;
use App\ExpenseCategory;

use Response;
use Validator;

class ExpenseCategController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expensecategories = ExpenseCategory::all();

        return Response::json(array(
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
        $validator = Validator::make($request->all(), [
            'manage_expensecategory_name' => 'required',
            'manage_expensecategory_desc' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'Please provide all the details'),
                200
            );
        }

        $expenseCategory                   = new ExpenseCategory();
        $expenseCategory->display_name     = $request->manage_expensecategory_name;
        $expenseCategory->description      = $request->manage_expensecategory_desc;
        $expenseCategory->save();

        return Response::json(array(
            'expensecategory'      => collect($expenseCategory)->toArray(),
            'status'               => true),
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
        $expenseCategory = ExpenseCategory::find($id);

        return Response::json(array(
            'expensecategory'      => collect($expenseCategory)->toArray()),
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
        $expenseCategory                   = ExpenseCategory::find($id);

        $validator = Validator::make($request->all(), [
            'manage_expensecategory_name' => 'required',
            'manage_expensecategory_desc' => 'required'
        ]);

        if ($validator->fails()) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'Please provide all the details'),
                200
            );
        }

        $expenseCategory->display_name           = $request->manage_expensecategory_name;
        $expenseCategory->description            = $request->manage_expensecategory_desc;
        $expenseCategory->save();

        return Response::json(array(
            'expensecategory'      => collect($expenseCategory)->toArray(),
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
        $expense = Expense::where('expense_categ_id',$id)->get()->count();
        if($expense > 0) {
            return Response::json(array(
                'status'    => false,
                'message'   => 'Expense Category is still in use. Please do not delete.'),
                200
            );
        }
        $expenseCategory = ExpenseCategory::find($id);
        $expenseCategory->delete();

        return Response::json(array(
            'status'    => true),
            200
        );
    }
}
