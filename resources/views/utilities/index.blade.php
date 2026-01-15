@extends('layouts.app')

@section('title', 'Utilidad Bruta')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Utilidad Bruta</h1>
        <p class="text-gray-600">Resumen financiero y análisis por proveedor</p>
    </div>

    <!-- Summary Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <!-- Total Incomes Card -->
        <div class="bg-gradient-to-br from-green-500 to-green-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                    </svg>
                </div>
            </div>
            <h3 class="text-sm font-medium opacity-90 mb-1">Ingresos Totales</h3>
            <p class="text-3xl font-bold">${{ number_format($totalIncomes, 2) }}</p>
        </div>

        <!-- Total Expenses Card -->
        <div class="bg-gradient-to-br from-red-500 to-red-600 rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 17h8m0 0V9m0 8l-8-8-4 4-6-6" />
                    </svg>
                </div>
            </div>
            <h3 class="text-sm font-medium opacity-90 mb-1">Gastos Totales</h3>
            <p class="text-3xl font-bold">${{ number_format($totalExpenses, 2) }}</p>
        </div>

        <!-- Gross Profit Card -->
        <div class="bg-gradient-to-br {{ $globalUtility >= 0 ? 'from-blue-500 to-blue-600' : 'from-orange-500 to-orange-600' }} rounded-xl shadow-lg p-6 text-white transform hover:scale-105 transition-transform duration-200">
            <div class="flex items-center justify-between mb-4">
                <div class="p-3 bg-white bg-opacity-20 rounded-lg">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z" />
                    </svg>
                </div>
            </div>
            <h3 class="text-sm font-medium opacity-90 mb-1">Utilidad Bruta</h3>
            <p class="text-3xl font-bold">${{ number_format($globalUtility, 2) }}</p>
        </div>
    </div>

    <!-- Table Section -->
    <div class="bg-white rounded-xl shadow-lg overflow-hidden">
        <div class="px-6 py-4 bg-gradient-to-r from-gray-50 to-gray-100 border-b border-gray-200">
            <h2 class="text-xl font-bold text-gray-800">Análisis por Proveedor</h2>
            <p class="text-sm text-gray-600 mt-1">Detalle de ingresos, gastos y utilidad por cada proveedor</p>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Proveedor</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Ingresos</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Gastos</th>
                        <th class="px-6 py-4 text-left text-xs font-bold text-gray-700 uppercase tracking-wider">Utilidad Bruta</th>
                        <th class="px-6 py-4 text-center text-xs font-bold text-gray-700 uppercase tracking-wider">Acciones</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($providers as $provider)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div class="h-10 w-10 flex-shrink-0 bg-gradient-to-br from-blue-400 to-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                    {{ strtoupper(substr($provider['name'], 0, 1)) }}
                                </div>
                                <div class="ml-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $provider['name'] }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-bold text-green-600">${{ number_format($provider['total_incomes'], 2) }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <svg class="w-5 h-5 text-red-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-8.707l-3-3a1 1 0 00-1.414 1.414L10.586 9H7a1 1 0 100 2h3.586l-1.293 1.293a1 1 0 101.414 1.414l3-3a1 1 0 000-1.414z" clip-rule="evenodd" />
                                </svg>
                                <span class="text-sm font-bold text-red-600">${{ number_format($provider['total_expenses'], 2) }}</span>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <span class="px-3 py-1 inline-flex text-sm font-bold rounded-full {{ $provider['utility'] >= 0 ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $provider['utility'] >= 0 ? '+' : '' }}${{ number_format($provider['utility'], 2) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-center">
                            <button data-provider-id="{{ $provider['id'] }}"
                                onclick="toggleDetail(this.dataset.providerId)"
                                class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-colors shadow-sm">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                                Ver Detalle
                            </button>
                        </td>
                    </tr>
                    <!-- Detail Row -->
                    <tr id="detail-{{ $provider['id'] }}" class="hidden bg-gradient-to-r from-gray-50 to-blue-50">
                        <td colspan="5" class="px-6 py-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Incomes Detail -->
                                <div class="bg-white rounded-lg p-5 shadow-sm border-l-4 border-green-500">
                                    <div class="flex items-center mb-4">
                                        <svg class="w-6 h-6 text-green-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                                        </svg>
                                        <h4 class="text-lg font-bold text-green-700">Ingresos</h4>
                                    </div>
                                    <div class="space-y-3 max-h-64 overflow-y-auto">
                                        @forelse($provider['incomes'] as $income)
                                        <div class="flex justify-between items-start p-3 bg-green-50 rounded-lg hover:bg-green-100 transition-colors">
                                            <div class="flex-1">
                                                <div class="flex items-center mb-1">
                                                    <span class="text-xs font-medium text-gray-500 bg-white px-2 py-1 rounded">{{ $income->date }}</span>
                                                </div>
                                                @if($income->description)
                                                <p class="text-sm text-gray-600 mt-1">{{ $income->description }}</p>
                                                @endif
                                            </div>
                                            <span class="text-sm font-bold text-green-700 ml-3">${{ number_format($income->amount, 2) }}</span>
                                        </div>
                                        @empty
                                        <div class="text-center py-8">
                                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                            <p class="text-gray-500 text-sm">No hay ingresos registrados</p>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>

                                <!-- Expenses Detail -->
                                <div class="bg-white rounded-lg p-5 shadow-sm border-l-4 border-red-500">
                                    <div class="flex items-center mb-4">
                                        <svg class="w-6 h-6 text-red-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 10h18M7 15h1m4 0h1m-7 4h12a3 3 0 003-3V8a3 3 0 00-3-3H6a3 3 0 00-3 3v8a3 3 0 003 3z" />
                                        </svg>
                                        <h4 class="text-lg font-bold text-red-700">Gastos</h4>
                                    </div>
                                    <div class="space-y-3 max-h-64 overflow-y-auto">
                                        @forelse($provider['expenses'] as $expense)
                                        <div class="flex justify-between items-start p-3 bg-red-50 rounded-lg hover:bg-red-100 transition-colors">
                                            <div class="flex-1">
                                                <div class="flex items-center mb-1">
                                                    <span class="text-xs font-medium text-gray-500 bg-white px-2 py-1 rounded">{{ $expense->date }}</span>
                                                </div>
                                                @if($expense->description)
                                                <p class="text-sm text-gray-600 mt-1">{{ $expense->description }}</p>
                                                @endif
                                            </div>
                                            <span class="text-sm font-bold text-red-700 ml-3">${{ number_format($expense->amount, 2) }}</span>
                                        </div>
                                        @empty
                                        <div class="text-center py-8">
                                            <svg class="w-12 h-12 text-gray-300 mx-auto mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
                                            </svg>
                                            <p class="text-gray-500 text-sm">No hay gastos registrados</p>
                                        </div>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@push('scripts')
<script>
    function toggleDetail(providerId) {
        const detailRow = document.getElementById(`detail-${providerId}`);
        detailRow.classList.toggle('hidden');
    }
</script>
@endpush
@endsection