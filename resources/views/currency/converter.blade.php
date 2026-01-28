@extends('layouts.app')

@section('title', 'Currency Converter')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="max-w-2xl mx-auto bg-white rounded-lg shadow-md p-6">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">Travel Currency Converter</h1>
        
        <div class="mb-6">
            <p class="text-gray-600 text-center">Easily convert between different currencies for your travels</p>
        </div>

        <div id="currency-converter-app">
            <form @submit.prevent="convertCurrency" class="space-y-4">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="amount" class="block text-sm font-medium text-gray-700 mb-1">Amount</label>
                        <input 
                            type="number" 
                            id="amount" 
                            v-model="amount" 
                            step="0.01" 
                            min="0" 
                            placeholder="Enter amount" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
                    </div>
                    
                    <div>
                        <label for="from_currency" class="block text-sm font-medium text-gray-700 mb-1">From Currency</label>
                        <select 
                            id="from_currency" 
                            v-model="fromCurrency" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
                            <option value="">Select currency</option>
                            <option v-for="(name, code) in currencies" :value="code">@{{ code }} - @{{ name }}</option>
                        </select>
                    </div>
                </div>
                
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label for="to_currency" class="block text-sm font-medium text-gray-700 mb-1">To Currency</label>
                        <select 
                            id="to_currency" 
                            v-model="toCurrency" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                            required
                        >
                            <option value="">Select currency</option>
                            <option v-for="(name, code) in currencies" :value="code">@{{ code }} - @{{ name }}</option>
                        </select>
                    </div>
                    
                    <div class="flex items-end">
                        <button 
                            type="submit" 
                            :disabled="loading"
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-medium py-2 px-4 rounded-md transition duration-300 disabled:opacity-50"
                        >
                            <span v-if="!loading">Convert Currency</span>
                            <span v-else>Converting...</span>
                        </button>
                    </div>
                </div>
            </form>
            
            <!-- Results -->
            <div v-if="result" class="mt-8 p-4 bg-green-50 border border-green-200 rounded-md">
                <h3 class="text-lg font-medium text-green-800 mb-2">Conversion Result</h3>
                <p class="text-gray-700">
                    <span class="font-semibold">@{{ result.original_amount }} @{{ result.from_currency }}</span> 
                    = 
                    <span class="font-semibold text-xl">@{{ result.converted_amount.toFixed(2) }} @{{ result.to_currency }}</span>
                </p>
                <p class="text-sm text-gray-600 mt-1">Exchange Rate: 1 @{{ result.from_currency }} = @{{ result.exchange_rate.toFixed(4) }} @{{ result.to_currency }}</p>
            </div>
            
            <!-- Error Message -->
            <div v-if="error" class="mt-8 p-4 bg-red-50 border border-red-200 rounded-md">
                <p class="text-red-700">@{{ error }}</p>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const { createApp, ref, onMounted } = Vue;
    
    createApp({
        setup() {
            const amount = ref(1);
            const fromCurrency = ref('USD');
            const toCurrency = ref('EUR');
            const currencies = ref({});
            const result = ref(null);
            const error = ref(null);
            const loading = ref(false);
            
            const getCurrencies = async () => {
                try {
                    const response = await fetch('/currencies');
                    currencies.value = await response.json();
                } catch (err) {
                    console.error('Error fetching currencies:', err);
                }
            };
            
            const convertCurrency = async () => {
                error.value = null;
                result.value = null;
                loading.value = true;
                
                try {
                    const response = await fetch('/currency-convert', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        },
                        body: JSON.stringify({
                            amount: parseFloat(amount.value),
                            from_currency: fromCurrency.value,
                            to_currency: toCurrency.value
                        })
                    });
                    
                    const data = await response.json();
                    
                    if (data.success) {
                        result.value = data;
                    } else {
                        error.value = data.error || 'Conversion failed';
                    }
                } catch (err) {
                    error.value = 'An error occurred during conversion';
                    console.error(err);
                } finally {
                    loading.value = false;
                }
            };
            
            onMounted(() => {
                getCurrencies();
            });
            
            return {
                amount,
                fromCurrency,
                toCurrency,
                currencies,
                result,
                error,
                loading,
                convertCurrency
            };
        }
    }).mount('#currency-converter-app');
});
</script>
@endsection