<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use Illuminate\Http\Request;

class UtilityController extends Controller
{
    public function index(Request $request)
    {
        $providers = Provider::with(['incomes', 'expenses'])
            ->get()->map(function ($provider) {
                $incomes_sum = $provider->incomes->sum('amount');
                $expenses_sum =  $provider->expenses->sum('amount');

                return [
                    'id' => $provider->id,
                    'name' => $provider->name,
                    'total_incomes' => $incomes_sum ?? 0,
                    'total_expenses' => $expenses_sum ?? 0,
                    'utility' => ($incomes_sum ?? 0) - ($expenses_sum ?? 0),
                    'incomes' => $provider->incomes,
                    'expenses' => $provider->expenses
                ];
            });
        $totalIncomes = $providers->sum('total_incomes');
        $totalExpenses = $providers->sum('total_expenses');
        $globalUtility = $totalIncomes - $totalExpenses;
        return view('utilities.index', compact('totalIncomes', 'totalExpenses', 'globalUtility', 'providers'));
    }
}
