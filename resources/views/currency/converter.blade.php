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

                            <form id="currency-converter-form" class="mb-4">
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <label for="amount" class="form-label fw-medium">Amount</label>
                                        <input 
                                            type="number" 
                                            id="amount" 
                                            value="1"
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
                                            class="form-select form-select-lg"
                                            required
                                        >
                                            <option value="">Select currency</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="row g-3 mt-2">
                                    <div class="col-md-6">
                                        <label for="to_currency" class="form-label fw-medium">To Currency</label>
                                        <select 
                                            id="to_currency" 
                                            class="form-select form-select-lg"
                                            required
                                        >
                                            <option value="">Select currency</option>
                                        </select>
                                    </div>
                                    
                                    <div class="col-md-6 d-flex align-items-end">
                                        <button 
                                            type="submit" 
                                            id="convert-btn"
                                            class="btn btn-primary btn-lg w-100"
                                        >
                                            Convert Currency
                                        </button>
                                    </div>
                                </div>
                            </form>
                            
                            <!-- Results -->
                            <div id="result-container" class="d-none">
                                <div class="alert alert-success mt-4">
                                    <h4 class="alert-heading">Conversion Result</h4>
                                    <p class="mb-0">
                                        <strong><span id="original-amount"></span> <span id="from-currency-code"></span></strong> 
                                        = 
                                        <strong class="fs-3"><span id="converted-amount"></span> <span id="to-currency-code"></span></strong>
                                    </p>
                                    <small class="text-muted">Exchange Rate: 1 <span id="rate-from-currency"></span> = <span id="exchange-rate"></span> <span id="rate-to-currency"></span></small>
                                </div>
                            </div>
                            
                            <!-- Error Message -->
                            <div id="error-container" class="d-none alert alert-danger mt-4">
                                <p class="mb-0"><span id="error-message"></span></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const amountInput = document.getElementById('amount');
        const fromCurrencySelect = document.getElementById('from_currency');
        const toCurrencySelect = document.getElementById('to_currency');
        const convertBtn = document.getElementById('convert-btn');
        const form = document.getElementById('currency-converter-form');
        const resultContainer = document.getElementById('result-container');
        const errorContainer = document.getElementById('error-container');
        
        // Load currencies on page load
        async function loadCurrencies() {
            try {
                const response = await fetch('/currencies');
                const currencies = await response.json();
                
                // Clear existing options except the first one
                fromCurrencySelect.innerHTML = '<option value="">Select currency</option>';
                toCurrencySelect.innerHTML = '<option value="">Select currency</option>';
                
                // Add new options
                for (const [code, name] of Object.entries(currencies)) {
                    const option1 = document.createElement('option');
                    option1.value = code;
                    option1.textContent = `${code} - ${name}`;
                    fromCurrencySelect.appendChild(option1);
                    
                    const option2 = document.createElement('option');
                    option2.value = code;
                    option2.textContent = `${code} - ${name}`;
                    toCurrencySelect.appendChild(option2);
                }
                
                // Set default selections
                fromCurrencySelect.value = 'USD';
                toCurrencySelect.value = 'EUR';
            } catch (err) {
                console.error('Error loading currencies:', err);
            }
        }
        
        // Handle form submission
        form.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            // Show loading state
            convertBtn.disabled = true;
            convertBtn.textContent = 'Converting...';
            
            try {
                // Build query parameters for GET request to avoid CSRF issues
                const params = new URLSearchParams({
                    amount: parseFloat(amountInput.value),
                    from_currency: fromCurrencySelect.value,
                    to_currency: toCurrencySelect.value
                });
                
                const response = await fetch(`/currency-convert?${params}`, {
                    method: 'GET',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                });
                
                const data = await response.json();
                
                if (data.success) {
                    // Display result
                    document.getElementById('original-amount').textContent = data.original_amount;
                    document.getElementById('from-currency-code').textContent = data.from_currency;
                    document.getElementById('converted-amount').textContent = data.converted_amount.toFixed(2);
                    document.getElementById('to-currency-code').textContent = data.to_currency;
                    document.getElementById('rate-from-currency').textContent = data.from_currency;
                    document.getElementById('exchange-rate').textContent = data.exchange_rate.toFixed(4);
                    document.getElementById('rate-to-currency').textContent = data.to_currency;
                    
                    resultContainer.classList.remove('d-none');
                    errorContainer.classList.add('d-none');
                } else {
                    // Display error
                    document.getElementById('error-message').textContent = data.error || 'Conversion failed';
                    errorContainer.classList.remove('d-none');
                    resultContainer.classList.add('d-none');
                }
            } catch (err) {
                // Display error
                document.getElementById('error-message').textContent = 'An error occurred during conversion';
                errorContainer.classList.remove('d-none');
                resultContainer.classList.add('d-none');
                console.error(err);
            } finally {
                // Reset button state
                convertBtn.disabled = false;
                convertBtn.textContent = 'Convert Currency';
            }
        });
        
        // Initialize currencies
        loadCurrencies();
    });
    </script>
</x-main>