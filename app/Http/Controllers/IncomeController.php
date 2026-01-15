<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIncomeRequest;
use App\Http\Requests\UpdateIncomeRequest;
use App\Models\Income;
use App\Models\Provider;
use Carbon\Carbon;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Income::with('provider');
        if ($request->filled('date_start')) {
            $query->where('date', '>=', $request->date_start);
        }
        if ($request->filled('date_end')) {
            $query->where('date', '<=', $request->date_end);
        }
        if ($request->filled('provider_id')) {
            $query->where('provider_id', $request->provider_id);
        }
        $incomes = $query->latest()->paginate(10);
        $providers = $this->getProviders();
        return view('incomes.index', compact('incomes', 'providers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $providers = $this->getProviders();
        return view('incomes.create', compact('providers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncomeRequest $request)
    {
        Income::create($request->validated());
        return redirect()->route('incomes.index')->with('success', 'Ingreso creado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Income $income)
    {
        $providers = $this->getProviders();
        return view('incomes.edit', compact('income', 'providers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncomeRequest $request, Income $income)
    {
        $income->update($request->validated());
        return redirect()->route('incomes.index')->with('success', 'Ingreso actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Income $income)
    {
        $income->delete();
        return redirect()->route('incomes.index')->with('success', 'Ingreso eliminado correctamente');
    }

    private function getProviders()
    {
        return Provider::all();
    }
}
