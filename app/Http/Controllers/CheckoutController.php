<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{

    public function checkout(Request $request, Course $course): RedirectResponse
    {
        if ($request->get('is_accept') === null) {
            return redirect()->back()->with(['error' => 'Please Accept The Terms & Conditions']);
        }

        return redirect()->to($this->createPaymentUrl($course->lastPrice, $request->get('payment_method'), $course->id));
    }

    public function validatePayment(Request $request): View
    {
        $inputData = [];
        foreach ($_GET as $key => $value) {
            if (str_starts_with($key, "vnp_")) {
                $inputData[$key] = $value;
            }
        }
        $vnp_SecureHash = $inputData['vnp_SecureHash'];
        unset($inputData['vnp_SecureHash']);
        ksort($inputData);
        $i = 0;
        $hashData = "";
        foreach ($inputData as $key => $value) {
            if ($i === 1) {
                $hashData .= '&'.urlencode($key)."=".urlencode($value);
            } else {
                $hashData .= urlencode($key)."=".urlencode($value);
                $i = 1;
            }
        }
        $secureHash = hash_hmac('sha512', $hashData, env('VNP_HASH_SECRET'));
        if ($secureHash !== $vnp_SecureHash) {
            abort(403, 'Invalid signature');
        }
        $data = $request->all();
        if (! isset($data['vnp_TxnRef'], $data['vnp_BankCode'])) {
            abort(403, 'Bad request');
        }
        $course = Course::query()->find($data['vnp_OrderInfo']);
        $course->users()->sync([
            authed()->id->toString() => ['price' => $course->lastPrice],
        ]);

        return view('course.checkout_success', [
            'course' => $course,
        ]);
    }

    private function createPaymentUrl($amount, $bank_code, $course_id): string
    {
        $vnp_TmnCode = env('VNP_TMNCODE');
        $vnp_HashSecret = env('VNP_HASH_SECRET');
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = route('checkout.success');
        $startTime = date("YmdHis");
        $expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));

        $vnp_TxnRef = $course_id;
        $vnp_Amount = $amount;
        $vnp_Locale = 'vn';
        $vnp_BankCode = $bank_code;
        $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];

        $inputData = [
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount* 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => $vnp_TxnRef,
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate"=>$expire
        ];

        if (isset($vnp_BankCode) && $vnp_BankCode !== "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i === 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url .= "?".$query;
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;

        return $vnp_Url;
    }

}
