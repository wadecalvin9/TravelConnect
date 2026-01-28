<x-main>
    <title>Travel Currency Converter</title>

    <section class="py-5 bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="card shadow-lg border-0 rounded-4 p-4">
                        <div class="card-body">
                            <h1 class="text-center fw-bold mb-4 text-dark">Travel Currency Converter</h1>
                            
                            <p class="text-center text-muted mb-5">Easily convert between different currencies for your travels</p>

                            <div id="currency-converter-app">
                                <form @submit.prevent="convertCurrency" class="mb-4">
                                    <div class="row g-3">
                                        <div class="col-md-6">
                                            <label for="amount" class="form-label fw-medium">Amount</label>
                                            <input 
                                                type="number" 
                                                id="amount" 
                                                v-model="amount" 
                                                step="0.01" 
                                                min="0" 
                                                placeholder="Enter amount" 
                                                class="form-control form-control-lg"
                                                required
                                            >
                                        </div>
                                        
                                        <div class="col-md-6">
                                            <label for="from_currency" class="form-label fw-medium">From Currency</label>
                                            <select 
                                                id="from_currency" 
                                                v-model="fromCurrency" 
                                                class="form-select form-select-lg"
                                                required
                                            >
                                                <option value="">Select currency</option>
                                                <option v-for="(name, code) in currencies" :value="code">@{{ code }} - @{{ name }}</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="row g-3 mt-2">
                                        <div class="col-md-6">
                                            <label for="to_currency" class="form-label fw-medium">To Currency</label>
                                            <select 
                                                id="to_currency" 
                                                v-model="toCurrency" 
                                                class="form-select form-select-lg"
                                                required
                                            >
                                                <option value="">Select currency</option>
                                                <option v-for="(name, code) in currencies" :value="code">@{{ code }} - @{{ name }}</option>
                                            </select>
                                        </div>
                                        
                                        <div class="col-md-6 d-flex align-items-end">
                                            <button 
                                                type="submit" 
                                                :disabled="loading"
                                                class="btn btn-primary btn-lg w-100"
                                            >
                                                <span v-if="!loading">Convert Currency</span>
                                                <span v-else>Converting...</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                
                                <!-- Results -->
                                <div v-if="result" class="alert alert-success mt-4">
                                    <h4 class="alert-heading">Conversion Result</h4>
                                    <p class="mb-0">
                                        <strong>@{{ result.original_amount }} @{{ result.from_currency }}</strong> 
                                        = 
                                        <strong class="fs-3">@{{ result.converted_amount.toFixed(2) }} @{{ result.to_currency }}</strong>
                                    </p>
                                    <small class="text-muted">Exchange Rate: 1 @{{ result.from_currency }} = @{{ result.exchange_rate.toFixed(4) }} @{{ result.to_currency }}</small>
                                </div>
                                
                                <!-- Error Message -->
                                <div v-if="error" class="alert alert-danger mt-4">
                                    <p class="mb-0">@{{ error }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
</x-main>