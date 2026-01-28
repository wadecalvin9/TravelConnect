<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CurrencyController extends Controller
{
    public function index()
    {
        return view('currency.converter');
    }

    public function convert(Request $request)
    {
        try {
            // For GET requests, use query parameters; for POST requests, use input
            $amount = $request->input('amount') ?: $request->query('amount');
            $fromCurrency = $request->input('from_currency') ?: $request->query('from_currency');
            $toCurrency = $request->input('to_currency') ?: $request->query('to_currency');

            // Validate inputs
            if (!$amount || !$fromCurrency || !$toCurrency) {
                return response()->json(['error' => 'Missing required parameters'], 400);
            }

            // Using a free currency conversion API
            $apiKey = env('EXCHANGE_API_KEY'); // You'll need to add this to your .env file
            
            if (!$apiKey) {
                // Fallback to a free tier API if no key is provided
                $response = Http::get("https://api.exchangerate-api.com/v4/latest/{$fromCurrency}");
            } else {
                $response = Http::withHeaders([
                    'apikey' => $apiKey
                ])->get("https://api.apilayer.com/exchangerates_data/convert?to={$toCurrency}&from={$fromCurrency}&amount={$amount}");
            }

            if ($response->successful()) {
                $data = $response->json();
                
                if (!$apiKey) {
                    // Handle response from exchange-api.com
                    if (isset($data['rates'][$toCurrency])) {
                        $convertedAmount = $data['rates'][$toCurrency] * $amount;
                        $rate = $data['rates'][$toCurrency];
                    } else {
                        return response()->json(['error' => 'Invalid currency'], 400);
                    }
                } else {
                    // Handle response from apilayer
                    $convertedAmount = $data['result'] ?? 0;
                    $rate = $data['info']['rate'] ?? 0;
                }

                return response()->json([
                    'success' => true,
                    'original_amount' => $amount,
                    'from_currency' => $fromCurrency,
                    'to_currency' => $toCurrency,
                    'converted_amount' => $convertedAmount,
                    'exchange_rate' => $rate
                ]);
            } else {
                \Log::error('Currency conversion API failed', [
                    'status_code' => $response->status(),
                    'response' => $response->body(),
                    'params' => ['amount' => $amount, 'from' => $fromCurrency, 'to' => $toCurrency]
                ]);
                return response()->json(['error' => 'Failed to fetch exchange rate'], 500);
            }
        } catch (\Exception $e) {
            \Log::error('Currency conversion error: ' . $e->getMessage(), [
                'trace' => $e->getTraceAsString(),
                'params' => [
                    'amount' => $request->input('amount'),
                    'from_currency' => $request->input('from_currency'),
                    'to_currency' => $request->input('to_currency')
                ]
            ]);
            return response()->json(['error' => 'Internal server error'], 500);
        }
    }

    public function getSupportedCurrencies()
    {
        // Return a list of commonly supported currencies
        $currencies = [
            'USD' => 'US Dollar',
            'EUR' => 'Euro',
            'GBP' => 'British Pound',
            'JPY' => 'Japanese Yen',
            'CAD' => 'Canadian Dollar',
            'AUD' => 'Australian Dollar',
            'CHF' => 'Swiss Franc',
            'CNY' => 'Chinese Yuan',
            'SEK' => 'Swedish Krona',
            'NZD' => 'New Zealand Dollar',
            'MXN' => 'Mexican Peso',
            'SGD' => 'Singapore Dollar',
            'HKD' => 'Hong Kong Dollar',
            'NOK' => 'Norwegian Krone',
            'TRY' => 'Turkish Lira',
            'RUB' => 'Russian Ruble',
            'INR' => 'Indian Rupee',
            'BRL' => 'Brazilian Real',
            'ZAR' => 'South African Rand',
            'KES' => 'Kenyan Shilling'
        ];

        return response()->json($currencies);
    }
}