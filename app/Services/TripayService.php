<?php

namespace Services;

use Illuminate\Support\Facades\Http;

class TripayService
{
    public function http($method, $slug, $data = [])
    {
        if (config('services.tripay.debug')) {
            $base_uri = 'https://payment.tripay.co.id/api/';
        }else{
            $base_uri = 'https://payment.tripay.co.id/api-sandbox/';
        }

        if ($method == 'get') {
            $response = Http::asForm()
            ->withOptions(['base_uri' => $base_uri, 'debug' => false])
            ->withToken(config('services.tripay.key'))
            ->get($slug, $data)
            ->json();
        }elseif ($method == 'post') {
            $response = Http::asForm()
            ->withOptions(['base_uri' => $base_uri, 'debug' => false])
            ->withToken(config('services.tripay.key'))
            ->post($slug, $data)
            ->json();
        }

        if (!$response['success']) {
            return false;
        }

        return $response['data'];

    }

    public function channel($code = null)
    {
        return $this->http('get', 'merchant/payment-channel', ['code' => $code]);
    }

    public function calculate($code, $amount)
    {
        return $this->http('get', 'merchant/fee-calculator', ['code' => $code, 'amount' => $amount]);
    }

    public function signature($ref, $amount)
    {
        $key = config('services.tripay.private');
        $code = config('services.tripay.code');

        $signature = hash_hmac('sha256', $code . $ref . $amount, $key);

        return $signature;
    }

    public function request($data = [])
    {
        return $this->http('post', 'transaction/create', [
            'method'         => $data['method'],
            'merchant_ref'   => $data['merchant_ref'],
            'amount'         => $data['amount'],
            'customer_name'  => $data['customer_name'],
            'customer_email' => $data['customer_email'],
            'customer_phone' => $data['customer_phone'] ?? null,
            'order_items'    => $data['order_items'],
            'return_url'     => route('user.booking.index'),
            'signature'      => $this->signature($data['merchant_ref'], $data['amount'])
            ]);
        }

        public function detail($ref)
        {
            return $this->http('get', 'transaction/detail', ['reference' => $ref]);
        }
    }
