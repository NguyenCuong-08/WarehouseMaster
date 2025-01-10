<?php

namespace App\Modules\Payment\Controllers\Admin;

use App\Modules\Payment\Controllers\Admin\PaymentHistoryController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Exception;
use App\Modules\Payment\Controllers\Admin\Exceptions\ErrorCode;
use App\Modules\Payment\Controllers\Admin\Exceptions\ErrorMessage;

class CheckoutController extends Controller
{
    //  payos - Tạo link nạp tiền & chuyển hướng sang payos
    public function createPaymentLink(Request $request)
    {
        //  Cấu hình
        $clientId = env('PAYOS_CLIENT_ID');
        $apiKey = env('PAYOS_API_KEY');
        $checksumKey = env('PAYOS_CHECKSUM_KEY');

        // Sửa kiểu số tiền - (100.000 đ => 100000)
        $tempNumber = $request->input('soTien');
        $goiDichVuId = $request->input('goiDichVuId');
        $tempPrice = preg_replace('/[^0-9]/', '', $tempNumber);
        $price = $tempPrice;

        //  Lấy thông tin để tạo link Payos
//        $YOUR_DOMAIN = "https://kinhdoanhbinhan.vn/payos";
        $YOUR_DOMAIN = "https://".request()->getHost()."/payos";
//        dd($YOUR_DOMAIN);
        $data = [
            "orderCode" => intval(substr(strval(microtime(true) * 10000), -6)), // Tạo ID ngẫu nhiên
            "amount" => intval($price), // Số tiền nhập vào từ input
            "goiDichVuId" => "",
            "description" => "Nap tien", // Mô tả về đơn thanh toán // không để để null
            "buyerName" => "",
//            "tam" => "Nguyễn Xuân Tâm",
            "returnUrl" => $YOUR_DOMAIN . '/succes', // Link chuyển hướng khi thanh toán thành công
            "cancelUrl" => $YOUR_DOMAIN . '/cancel' // Link chuyển hướng khi hủy thanh toán

        ];

//dd($data);
        error_log($data['orderCode']);

        try {
//die('tam');
            // Tạo link với data được tùy chỉnh
            $response = $this->createLink($data);

            // Tạo dữ liệu để nhập vào DB
            $dataToAdd = [
                'ma_don' => $data['orderCode'],
                'loai_don' => 'Nạp tiền',
                'so_tien' => $data['amount'],
                'cancel' => 0,
                'link' => $response['checkoutUrl'],
                'goiDichVuId' => $response['goiDichVuId'],
                'description' => $response['description']
            ];
            

            //  Lưu lịch sử thanh toán vào db
            $paymentHistoryController = new PaymentHistoryController();
            $request = new Request($dataToAdd);
            $paymentHistoryController->add($request);
//            dd($response);
            //  Chuyển hướng sang trang thanh toán của payos
            return redirect($response['checkoutUrl']);

        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    //
//    public function createLink(array $paymentData): array
//    {
//        // Cấu hình dữ liệu
//        $clientId = env('PAYOS_CLIENT_ID');
//        $apiKey = env('PAYOS_API_KEY');
//        $checksumKey = env('PAYOS_CHECKSUM_KEY');
//
//        $orderCode = $paymentData['orderCode'] ?? null;
//        $amount = $paymentData['amount'] ?? null;
//        $returnUrl = $paymentData['returnUrl'] ?? null;
//        $cancelUrl = $paymentData['cancelUrl'] ?? null;
//        $description = $paymentData['description'] ?? null;
//
//
//
////        dd($paymentData);
//
//
//        // Kiểm tra dữ liệu
//        if (!($paymentData && $orderCode && $amount && $returnUrl && $cancelUrl && $description)) {
//            $requiredPaymentData = [
//                'orderCode' => $orderCode,
//                'amount' => $amount,
//                'returnUrl' => $returnUrl,
//                'cancelUrl' => $cancelUrl,
//                'description' => $description
//            ];
//            $requiredKeys = array_keys($requiredPaymentData);
//
//            $keysError = array_filter($requiredKeys, function ($key) use ($requiredPaymentData) {
//                return $requiredPaymentData[$key] === null;
//            });
//
//            $msgError = ErrorMessage::INVALID_PARAMETER . ' ' . implode(', ', $keysError) . ' must not be null.';
//            throw new Exception($msgError, ErrorCode::INVALID_PARAMETER);
//        }
//
//        $url = 'https://api-merchant.payos.vn' . '/v2/payment-requests';
//
//        // Tạo chữ ký cho yêu cầu thanh toán
//        $signaturePaymentRequest = $this->createSignatureOfPaymentRequest(
//            $checksumKey,
//            $paymentData
//        );
//
//        try {
//            $headers = array(
//                'x-client-id: ' . $clientId,
//                'x-api-key: ' . $apiKey,
//                'Content-Type: application/json'
//            );
//            $data = array_merge($paymentData, ['signature' => $signaturePaymentRequest]);
////dd($data);
//            $paymentRequest = curl_init();
//            curl_setopt($paymentRequest, CURLOPT_URL, $url);
//            curl_setopt($paymentRequest, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($paymentRequest, CURLOPT_HTTPHEADER, $headers);
//            curl_setopt($paymentRequest, CURLOPT_POST, 1);
//            curl_setopt($paymentRequest, CURLOPT_POSTFIELDS, json_encode($data));
//            $paymentLinkRes = curl_exec($paymentRequest);
////            dd($paymentRequest);
//
////            #Ensure to close curl
//            curl_close($paymentRequest);
//            $paymentLinkRes = json_decode($paymentLinkRes, true);
////            $paymentLinkRes['data']['goiDichVuId'] = $data['goiDichVuId'];
//            dd($paymentLinkRes);
//
//
////         gửi dữ liệu JSON qua POST bằng cURL trong PHP.
//
//
//
//
//
//            // Tạo chữ ký mã hóa và trả về đường link
//            if ($paymentLinkRes['code'] == '00') {
//                $paymentLinkResSignature = $this->createSignatureFromObj(
//                    $checksumKey,
//                    $paymentLinkRes['data']
//                );
//                if ($paymentLinkResSignature !== $paymentLinkRes['signature']) {
//                    throw new Exception(ErrorMessage::DATA_NOT_INTEGRITY, ErrorCode::DATA_NOT_INTEGRITY);
//                }
//                if ($paymentLinkRes['data']) {
//                    return $paymentLinkRes['data'];
//                }
//            }
//            throw new Exception($paymentLinkRes['desc'], $paymentLinkRes['code']);
//        } catch (Exception $error) {
//            throw new Exception($error->getMessage(), $error->getCode());
//        }
//    }
    public function createLink(array $paymentData): array
    {
        // Cấu hình dữ liệu
        $clientId = env('PAYOS_CLIENT_ID');
        $apiKey = env('PAYOS_API_KEY');
        $checksumKey = env('PAYOS_CHECKSUM_KEY');

        $orderCode = $paymentData['orderCode'] ?? null;
        $amount = $paymentData['amount'] ?? null;
        $returnUrl = $paymentData['returnUrl'] ?? null;
        $cancelUrl = $paymentData['cancelUrl'] ?? null;
        $description = $paymentData['description'] ?? null;

        // Kiểm tra dữ liệu
        if (!($paymentData && $orderCode && $amount && $returnUrl && $cancelUrl && $description)) {
            $requiredPaymentData = [
                'orderCode' => $orderCode,
                'amount' => $amount,
                'returnUrl' => $returnUrl,
                'cancelUrl' => $cancelUrl,
                'description' => $description
            ];
            $requiredKeys = array_keys($requiredPaymentData);

            $keysError = array_filter($requiredKeys, function ($key) use ($requiredPaymentData) {
                return $requiredPaymentData[$key] === null;
            });

            $msgError = ErrorMessage::INVALID_PARAMETER . ' ' . implode(', ', $keysError) . ' must not be null.';
            throw new Exception($msgError, ErrorCode::INVALID_PARAMETER);
        }

        $url = 'https://api-merchant.payos.vn' . '/v2/payment-requests';

        // Tạo chữ ký cho yêu cầu thanh toán
        $signaturePaymentRequest = $this->createSignatureOfPaymentRequest(
            $checksumKey,
            $paymentData
        );

        try {
            $headers = array(
                'x-client-id: ' . $clientId,
                'x-api-key: ' . $apiKey,
                'Content-Type: application/json'
            );
            $data = array_merge($paymentData, ['signature' => $signaturePaymentRequest]);

            $paymentRequest = curl_init();
            curl_setopt($paymentRequest, CURLOPT_URL, $url);
            curl_setopt($paymentRequest, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($paymentRequest, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($paymentRequest, CURLOPT_POST, 1);
            curl_setopt($paymentRequest, CURLOPT_POSTFIELDS, json_encode($data));
            $paymentLinkRes = curl_exec($paymentRequest);
            curl_close($paymentRequest);
            $paymentLinkRes = json_decode($paymentLinkRes, true);
//            dd($paymentLinkRes);
            // Thêm $goiDichVuId vào mảng trả về
            if ($paymentLinkRes['code'] == '00') {
                $paymentLinkResSignature = $this->createSignatureFromObj(
                    $checksumKey,
                    $paymentLinkRes['data']
                );
                if ($paymentLinkResSignature !== $paymentLinkRes['signature']) {
                    throw new Exception(ErrorMessage::DATA_NOT_INTEGRITY, ErrorCode::DATA_NOT_INTEGRITY);
                }
                if ($paymentLinkRes['data']) {
                    return array_merge($paymentLinkRes['data'], ['goiDichVuId' => $paymentData['goiDichVuId']]);
                }
            }
            throw new Exception($paymentLinkRes['desc'], $paymentLinkRes['code']);
        } catch (Exception $error) {
            throw new Exception($error->getMessage(), $error->getCode());
        }
    }

    public static function createSignatureFromObj($checksumKey, $obj)
    {
        ksort($obj);
        $queryStrArr = [];
        foreach ($obj as $key => $value) {
            if (in_array($value, ["undefined", "null"]) || gettype($value) == "NULL") {
                $value = "";
            }

            if (is_array($value)) {
                $valueSortedElementObj = array_map(function ($ele) {
                    ksort($ele);
                    return $ele;
                }, $value);
                $value = json_encode($valueSortedElementObj, JSON_UNESCAPED_UNICODE);
            }
            $queryStrArr[] = $key . "=" . $value;
        }
        $queryStr = implode("&", $queryStrArr);
        $signature = hash_hmac('sha256', $queryStr, $checksumKey);
        return $signature;
    }

    public static function createSignatureOfPaymentRequest($checksumKey, $obj)
    {
        $dataStr = "amount={$obj["amount"]}&cancelUrl={$obj["cancelUrl"]}&description={$obj["description"]}&orderCode={$obj["orderCode"]}&returnUrl={$obj["returnUrl"]}";
        $signature = hash_hmac("sha256", $dataStr, $checksumKey);
        return $signature;
    }

//    public function getPaymentLinkInfomation(mixed  $orderCode): array
//    {
//        $clientId = env('PAYOS_CLIENT_ID');
//        $apiKey = env('PAYOS_API_KEY');
//        $checksumKey = env('PAYOS_CHECKSUM_KEY');
//
//        if (!$orderCode || (is_string($orderCode) && strlen($orderCode) == 0) || (is_int($orderCode) && $orderCode < 0)) {
//            throw new Exception(ErrorMessage::INVALID_PARAMETER, ErrorCode::INVALID_PARAMETER);
//        }
//        $url = 'https://api-merchant.payos.vn' . '/v2/payment-requests/' . $orderCode;
//        try {
//            $headers = array(
//                'x-client-id: ' . $clientId,
//                'x-api-key: ' . $apiKey,
//                'Content-Type: application/json'
//            );
//
//            $paymentRequest = curl_init();
//            curl_setopt($paymentRequest, CURLOPT_URL, $url);
//            curl_setopt($paymentRequest, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($paymentRequest, CURLOPT_HTTPHEADER, $headers);
//
//            $paymentLinkRes = curl_exec($paymentRequest);
//
//            # Ensure to close curl
//            curl_close($paymentRequest);
//            $paymentLinkRes = json_decode($paymentLinkRes, true);
//
//            if ($paymentLinkRes['code'] == '00') {
//                $paymentLinkResSignature = $this->createSignatureFromObj(
//                    $checksumKey,
//                    $paymentLinkRes['data']
//                );
//                if ($paymentLinkResSignature !== $paymentLinkRes['signature']) {
//                    throw new Exception(ErrorMessage::DATA_NOT_INTEGRITY, ErrorCode::DATA_NOT_INTEGRITY);
//                }
//                if ($paymentLinkRes['data']) {
//                    return $paymentLinkRes['data'];
//                }
//            }
//            throw new Exception($paymentLinkRes['desc'], $paymentLinkRes['code']);
//        } catch (Exception $error) {
//            throw new Exception($error->getMessage(), $error->getCode());
//        }
//    }


//    public function createOrder(Request $request)
//    {
//        $body = $request->input();
//        $body["amount"] = intval($body["amount"]);
//        $body["orderCode"] = intval(substr(strval(microtime(true) * 100000), -6));
//        try {
//            $response = $this->createPaymentLink($body);
//            return response()->json([
//                "error" => 0,
//                "message" => "Success",
//                "data" => $response["checkoutUrl"]
//            ]);
//        } catch (\Throwable $th) {
//            return response()->json([
//                "error" => $th->getCode(),
//                "message" => $th->getMessage(),
//                "data" => null
//            ]);
//        }
//    }

//    public function getPaymentLinkInfoOfOrder(mixed $id)
//    {
//        try {
//            $response = $this->getPaymentLinkInfomation($id);
//            return response()->json([
//                "error" => 0,
//                "message" => "Success",
//                "data" => $response["data"]
//            ]);
//        } catch (\Throwable $th) {
//            return response()->json([
//                "error" => $th->getCode(),
//                "message" => $th->getMessage(),
//                "data" => null
//            ]);
//        }
//    }

//    public function cancelPaymentLinkOfOrder(Request $request, string $id)
//    {
//        $body = json_decode($request->getContent(), true);
//        try {
//            $cancelBody = is_array($body) && $body["cancellationReason"] ? $body : null;
//            $response = $this->cancelPaymentLink($id, $cancelBody);
//            return response()->json([
//                "error" => 0,
//                "message" => "Success",
//                "data" => $response["data"]
//            ]);
//        } catch (\Throwable $th) {
//            return response()->json([
//                "error" => $th->getCode(),
//                "message" => $th->getMessage(),
//                "data" => null
//            ]);
//        }
//    }
//    public function cancelPaymentLink(mixed  $orderCode, ?string $cancellationReason = null): array
//    {
//        $clientId = env('PAYOS_CLIENT_ID');
//        $apiKey = env('PAYOS_API_KEY');
//        $checksumKey = env('PAYOS_CHECKSUM_KEY');
//
//        if (!$orderCode || (is_string($orderCode) && strlen($orderCode) == 0) || (is_int($orderCode) && $orderCode < 0)) {
//            throw new Exception(ErrorMessage::INVALID_PARAMETER, ErrorCode::INVALID_PARAMETER);
//        }
//        $url = PAYOS_BASE_URL . '/v2/payment-requests/' . $orderCode . '/cancel';
//        try {
//            $headers = array(
//                'x-client-id: ' . $clientId,
//                'x-api-key: ' . $apiKey,
//                'Content-Type: application/json'
//            );
//            $data = [
//                'cancellationReason' => $cancellationReason
//            ];
//
//            $cancelPaymentLinkRequest = curl_init();
//            curl_setopt($cancelPaymentLinkRequest, CURLOPT_URL, $url);
//            curl_setopt($cancelPaymentLinkRequest, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($cancelPaymentLinkRequest, CURLOPT_HTTPHEADER, $headers);
//
//            curl_setopt($cancelPaymentLinkRequest, CURLOPT_POST, 1);
//            curl_setopt($cancelPaymentLinkRequest, CURLOPT_POSTFIELDS, json_encode($data));
//            $cancelPaymentLinkRes = curl_exec($cancelPaymentLinkRequest);
//
//            #Ensure to close curl
//            curl_close($cancelPaymentLinkRequest);
//            $cancelPaymentLinkRes = json_decode($cancelPaymentLinkRes, true);
//
//            if ($cancelPaymentLinkRes['code'] == '00') {
//                $cancelPaymentLinkResSignature = $this->createSignatureFromObj(
//                    $checksumKey,
//                    $cancelPaymentLinkRes['data']
//                );
//                if ($cancelPaymentLinkResSignature !== $cancelPaymentLinkRes['signature']) {
//                    throw new Exception(ErrorMessage::DATA_NOT_INTEGRITY, ErrorCode::DATA_NOT_INTEGRITY);
//                }
//                if ($cancelPaymentLinkRes['data']) {
//                    return $cancelPaymentLinkRes['data'];
//                }
//            }
//            throw new Exception($cancelPaymentLinkRes['desc'], $cancelPaymentLinkRes['code']);
//        } catch (Exception $error) {
//            throw new Exception($error->getMessage(), $error->getCode());
//        }
//    }

//    public function handlePayOSWebhook(Request $request)
//    {
//        $body = json_decode($request->getContent(), true);
//        // Handle webhook test
//        if (in_array($body["data"]["description"], ["Ma giao dich thu nghiem", "VQRIO123"])) {
//            return response()->json([
//                "error" => 0,
//                "message" => "Ok",
//                "data" => $body["data"]
//            ]);
//        }
//
//        $webhookData = $body["data"];
//        $this->verifyPaymentWebhookData($webhookData);
//
//        /**
//         * Source code uses data of webhook
//         * ....
//         * ....
//         */
//        return response()->json([
//            "error" => 0,
//            "message" => "Ok",
//            "data" => $webhookData
//        ]);
//    }

//    public function confirmWebhook(string $webhookUrl): string
//    {
//        $clientId = env('PAYOS_CLIENT_ID');
//        $apiKey = env('PAYOS_API_KEY');
//        $checksumKey = env('PAYOS_CHECKSUM_KEY');
//
//        if (!$webhookUrl || strlen($webhookUrl) == 0) {
//            throw new Exception(ErrorMessage::INVALID_PARAMETER, ErrorCode::INVALID_PARAMETER);
//        }
//        $url = PAYOS_BASE_URL . '/confirm-webhook';
//
//        try {
//            $headers = array(
//                'x-client-id: ' . $clientId,
//                'x-api-key: ' . $apiKey,
//                'Content-Type: application/json'
//            );
//
//            $data = [
//                'webhookUrl' => $webhookUrl
//            ];
//
//            $confirmWebhookRequest = curl_init();
//            curl_setopt($confirmWebhookRequest, CURLOPT_URL, $url);
//            curl_setopt($confirmWebhookRequest, CURLOPT_RETURNTRANSFER, 1);
//            curl_setopt($confirmWebhookRequest, CURLOPT_HTTPHEADER, $headers);
//
//            curl_setopt($confirmWebhookRequest, CURLOPT_POST, 1);
//            curl_setopt($confirmWebhookRequest, CURLOPT_POSTFIELDS, json_encode($data));
//            $confirmWebhookRes = curl_exec($confirmWebhookRequest);
//
//            #Ensure to close curl
//            curl_close($confirmWebhookRequest);
//            $confirmWebhookRes = json_decode($confirmWebhookRes, true);
//            $reponseCode = curl_getinfo($confirmWebhookRequest, CURLINFO_HTTP_CODE);
//
//            if ($reponseCode == '400') {
//                throw new Exception(ErrorMessage::WEBHOOK_URL_INVALID, ErrorCode::WEBHOOK_URL_INVALID);
//            } else if ($reponseCode == '401') {
//                throw new Exception(ErrorMessage::UNAUTHORIZED, ErrorCode::UNAUTHORIZED);
//            } else if (Str::startsWith((string)$reponseCode, '5')) {
//                throw new Exception(ErrorMessage::INTERNAL_SERVER_ERROR, ErrorCode::INTERNAL_SERVER_ERROR);
//            }
//            return $webhookUrl;
//        } catch (Exception $error) {
//            throw new Exception($error->getMessage(), $error->getCode());
//        }
//    }
//
//    public function verifyPaymentWebhookData(array $webhookBody): array
//    {
//        $clientId = env('PAYOS_CLIENT_ID');
//        $apiKey = env('PAYOS_API_KEY');
//        $checksumKey = env('PAYOS_CHECKSUM_KEY');
//
//        if (!$webhookBody || count($webhookBody) == 0) {
//            throw new Exception(ErrorMessage::NO_DATA, ErrorCode::NO_DATA);
//        }
//        $signature = $webhookBody['signature'] ?? null;
//        $data = $webhookBody['data'] ?? null;
//
//        if (!$signature) {
//            throw new Exception(ErrorMessage::NO_SIGNATURE, ErrorCode::NO_SIGNATURE);
//        }
//        if (!$data) {
//            throw new Exception(ErrorMessage::NO_DATA, ErrorCode::NO_DATA);
//        }
//        $signatureData = $this->createSignatureFromObj($checksumKey, $data);
//        if ($signatureData !== $signature) {
//            throw new Exception(ErrorMessage::DATA_NOT_INTEGRITY, ErrorCode::DATA_NOT_INTEGRITY);
//        }
//        return $data;
//    }
}
