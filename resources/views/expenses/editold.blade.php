<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Gasto</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <div class="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8">
            <div class="mb-6">
                <h1 class="text-3xl font-bold text-gray-800">Editar Gasto</h1>
                <p class="text-gray-600 mt-2">Complete la siguiente información</p>
            </div>

            <form action="{{ route('expenses.update', $expense) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
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
                            <option value="{{ $provider->id }}" {{ old('provider_id', $expense->provider_id) == $provider->id ? 'selected' : ''}}>
                                {{ $provider->name }}
                            </option>
                            @endforeach
                        </select>
                        @error('provider_id')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="amount" class="block text-gray-700 font-medium mb-2">
                            Monto <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="number"
                            step="1.00"
                            name="amount"
                            id="amount"
                            value="{{ old('amount', $expense->amount) }}"
                            placeholder="0.00"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('amount') border-red-500 @enderror">
                        @error('amount')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="category" class="block text-gray-700 font-medium mb-2">
                            Concepto <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="text"
                            name="concept"
                            id="concept"
                            value="{{ old('concept', $expense->concept) }}"
                            placeholder="Pago de luz, agua, internet, teléfono..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('concept') border-red-500 @enderror">
                        @error('concept')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="date" class="block text-gray-700 font-medium mb-2">
                            Fecha <span class="text-red-500">*</span>
                        </label>
                        <input
                            type="date"
                            name="date"
                            id="date"
                            value="{{ old('date', $expense->date_formatted) }}"
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('date') border-red-500 @enderror">
                        @error('date')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="md:col-span-2">
                        <label for="description" class="block text-gray-700 font-medium mb-2">
                            Descripción
                        </label>
                        <textarea
                            name="description"
                            id="description"
                            rows="4"
                            placeholder="Alguna descripción adicional..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 @error('description') border-red-500 @enderror">{{ old('description', $expense->description) }}</textarea>
                        @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="flex gap-4 mt-8 pt-6 border-t border-gray-200">
                    <button
                        type="submit"
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 font-medium transition">
                        Actualizar gasto
                    </button>
                    <a
                        href="{{ route('expenses.index') }}"
                        class="bg-gray-500 text-white px-6 py-3 rounded-lg hover:bg-gray-600 font-medium transition">
                        Cancel
                    </a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>