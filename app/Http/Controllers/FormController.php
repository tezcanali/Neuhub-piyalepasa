<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class FormController extends Controller
{
    protected $authUrl = 'https://ivt.mobildev.com/auth';
    protected $postUrl = 'https://ivt.mobildev.com/data/';
    protected $smsUrl = 'https://ivt.mobildev.com/data/verify/';
    protected $username = '9551786522';
    protected $password = '2y31aurel98lzda5ikgza4lw1pb54s';

    public function formSubmit(Request $request)
    {
        $auth = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($this->username . ':' . $this->password),
        ])->post($this->authUrl);

        if (!$auth->successful()) {
            return response()->json([
                'success' => false,
                'message' => 'Kimlik doğrulama hatası'
            ], 401);
        }

        $bearerToken = $auth['access_token'];

        $data = [
            "firstName" => $request->firstName,
            "lastName" => $request->lastName,
            "msisdn" => $request->phone,
            "email" => $request->email,
            "note" => $request->message,
            "language" => "tr",
            "permSource" => 1,
            "accountType" => 1,
            "kvkk" => [
                "process" => 1,
                "share" => 1,
                "international" => 1,
            ],
            "etk" => [
                "msisdn" => 1,
                "msisdnFrequencyType" => 1,
                "msisdnFrequency" => 2,
                "call" => 1,
                "email" => 1,
                "emailFrequencyType" => 1,
                "emailFrequency" => 2,
                "share" => 1,
            ],
        ];

        $response = Http::withToken($bearerToken)
            ->post($this->postUrl . (strpos(request()->url(), '/en') !== false ? 'yv60h3c1' : 'g4miy64v'), $data);

        if ($response->successful()) {
            return response()->json([
                'success' => true,
                'dataId' => $response['dataId'],
                'data' => $request->all()
            ], 200);
        }

        return response()->json([
            'success' => false,
            'message' => 'Form gönderimi başarısız oldu',
            'errors' => $response->json()
        ], 422);
    }

    public function sendSms(Request $request)
    {
        $auth = Http::withHeaders([
            'Authorization' => 'Basic ' . base64_encode($this->username . ':' . $this->password),
        ])->post($this->authUrl);

        if (!$auth->successful()) {
            return response()->json([
                'success' => false,
                'message' => 'Kimlik doğrulama hatası'
            ], 401);
        }

        $bearerToken = $auth['access_token'];
        $url = $this->smsUrl . $request->dataId;

        $response = Http::withToken($bearerToken)
            ->post($url, [
                "item" => $request->phone,
                "code" => $request->code
            ]);

        if ($response->successful()) {
            $responseCrm = Http::withBasicAuth('admin', "2511PltGayrimenkul!'!':")
                ->post('https://gayrimenkulwebservice.polat.com/Home/Index', [
                    'MusteriAd' => $request->firstName,
                    'MusteriSoyad' => $request->lastName,
                    'Telefon' => $request->phone,
                    'Email' => $request->email,
                    'IletisimOnay' => 'Evet',
                    'Url' => 'www.piyalepasa.com.tr',
                    'ProjeAdi' => $request->konu,
                    'Dil' => 'TR',
                    'Tarih' => Carbon::now()->addHours(3),
                ]);

            if ($responseCrm->successful()) {
                $redirectRoute = strpos(request()->url(), '/en') !== false ? 'thank-you' : 'tesekkurler';

                return response()->json([
                    'success' => true,
                    'redirect' => route($redirectRoute, [
                        'name' => $request->firstName,
                        'email' => $request->email,
                        'phone' => $request->phone
                    ])
                ]);
            }

            return response()->json([
                'success' => false,
                'message' => "CRM sistemi ile iletişim hatası",
                'errors' => $responseCrm->json()
            ], 502);
        }

        return response()->json([
            'success' => false,
            'message' => "Doğrulama kodunuz hatalı, lütfen tekrar deneyiniz.",
            'errors' => $response->json()
        ], 422);
    }

    public function showTesekkurler(Request $request)
    {
        return view('front.layout.tesekkurler', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
    }

    public function showThankyou(Request $request)
    {
        return view('front.layout.tesekkurler', [
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone
        ]);
    }
}
