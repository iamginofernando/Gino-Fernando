<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $table      = 'expense';
    protected $primaryKey = 'expense_id';

    public function getCategory()  {
        return $this->belongsTo('App\ExpenseCategory','expense_categ_id');
    }

    public function getUser()  {
        return $this->belongsTo('App\User','user_id');
    }
}
