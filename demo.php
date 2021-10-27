<?php
require_once 'vendor/autoload.php';
use aop\AopClient;
use aop\request\AlipayTradeWapPayRequest;

$aop = new AopClient ();
$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
$aop->appId = 'your app_id';
$aop->rsaPrivateKey = '请填写开发者私钥去头去尾去回车，一行字符串';
$aop->alipayrsaPublicKey='请填写支付宝公钥，一行字符串';
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset='GBK';
$aop->format='json';
$object = new stdClass();
$object->out_trade_no = '20210817010101004';
$object->total_amount = 0.01;
$object->subject = '测试商品';
$object->product_code ='QUICK_WAP_WAY';
$object->time_expire = '2022-08-01 22:00:00';
////商品信息明细，按需传入
// $goodsDetail = [
//     [
//         'goods_id'=>'goodsNo1',
//         'goods_name'=>'子商品1',
//         'quantity'=>1,
//         'price'=>0.01,
//     ],
// ];
// $object->goodsDetail = $goodsDetail;
// //扩展信息，按需传入
// $extendParams = [
//     'sys_service_provider_id'=>'2088511833207846',
// ];
//  $object->extend_params = $extendParams;
$json = json_encode($object);
$request = new AlipayTradeWapPayRequest();
$request->setNotifyUrl('');
$request->setReturnUrl('');
$request->setBizContent($json);
$result = $aop->pageExecute ( $request); 

echo $result;

