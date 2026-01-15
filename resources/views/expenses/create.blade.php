@extends('layouts.app')

@section('title', 'Crear Gasto')

@section('content')
<div class="container mx-auto px-4 py-8">
    <!-- Breadcrumb -->
    <nav class="flex mb-6" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-3">
            <li class="inline-flex items-center">
                <a href="{{ route('expenses.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600">
                    <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path>
                    </svg>
                    Gastos
                </a>
            </li>
            <li aria-current="page">
                <div class="flex items-center">
                    <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path>
                    </svg>
                    <span class="ml-1 text-sm font-medium text-gray-500 md:ml-2">Crear Gasto</span>
                </div>
            </li>
        </ol>
    </nav>

    <!-- Header -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Crear Gasto</h1>
        <p class="text-gray-600">Completa la información para registrar un nuevo gasto</p>
    </div>

    <!-- Form Card -->
    <div class="max-w-full mx-auto">
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">
            <div class="px-6 py-4 bg-gradient-to-r from-blue-50 to-blue-100 border-b border-blue-200">
                <h2 class="text-xl font-bold text-gray-800">Información del Gasto</h2>
            </div>

            <form action="{{ route('expenses.store') }}" method="POST" class="p-8">
                @csrf

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- provider Field -->
                    <div>
                        <label for="provider_id" class="block text-gray-700 font-medium mb-2">
                            Proveedor <span class="text-red-500">*</span>
                        </label>
                        <select
                            name="provider_id"
                            id="provider_id"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('provider_id') border-red-500 @enderror">
                            <option value="">Seleccione un proveedor</option>
                            @foreach($providers as $provider)
                            <option value="{{ $provider->id }}" {{ old('provider_id') == $provider->id ? 'selected' : '' }}>
                                {{ $provider->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('provider_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- amout Field -->
                    <div>
                        <label for="amount" class="block text-gray-700 font-medium mb-2">
                            Monto <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="number"
                            step="0.01"
                            name="amount"
                            id="amount"
                            value="{{ old('amount') }}"
                            placeholder="0.00"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('amount') border-red-500 @enderror">
                        @error('amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- concept Field -->
                    <div>
                        <label for="concept" class="block text-gray-700 font-medium mb-2">
                            Concepto <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="concept"
                            id="concept"
                            value="{{ old('concept') }}"
                            placeholder="Ventas de productos,prestación de servicios..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('concept') border-red-500 @enderror">
                        @error('concept')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- date Field -->
                    <div>
                        <label for="date" class="block text-gray-700 font-medium mb-2">
                            Fecha <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="date"
                            name="date"
                            id="date"
                            value="{{ old('date', date('Y-m-d')) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('date') border-red-500 @enderror">
                        @error('date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <!-- description Field -->
                    <div class="md:col-span-2">
                        <label for="description" class="block text-gray-700 font-medium mb-2">
                            Descripción
                        </label>
                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            placeholder="Alguna descripción adicional..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description') }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 mt-8 pt-6 border-t border-gray-200">
                    <button
                        type="submit"
                        class="flex-1 sm:flex-none inline-flex justify-center items-center px-6 py-3 bg-gradient-to-r from-blue-600 to-blue-700 text-white font-medium rounded-lg hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 shadow-lg transform hover:scale-105 transition-all duration-200">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        Guardar gasto
                    </button>
                    <a
                        href="{{ route('expenses.index') }}"
                        class="flex-1 sm:flex-none inline-flex justify-center items-center px-6 py-3 bg-gray-500 text-white font-medium rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 shadow-md transition-colors">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection