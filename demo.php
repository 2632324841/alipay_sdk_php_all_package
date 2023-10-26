<?php
require_once 'vendor/autoload.php';
use aop\AopClient;
use aop\AopCertClient;
use aop\request\AlipayTradeWapPayRequest;

$aop = new AopCertClient;
$appCertPath = "appCertPublicKey.crt";
$alipayCertPath = "alipayCertPublicKey_RSA2.crt";
$rootCertPath = "alipayRootCert.crt";
$aop->gatewayUrl = "https://openapi.alipay.com/gateway.do";
$aop->appId = "appid";
$aop->rsaPrivateKey = '' ;
$aop->format = "json";
$aop->postCharset= "UTF-8";
$aop->signType= "RSA2";
//调用getPublicKey从支付宝公钥证书中提取公钥
$aop->alipayrsaPublicKey = $aop->getPublicKey($alipayCertPath);
//是否校验自动下载的支付宝公钥证书，如果开启校验要保证支付宝根证书在有效期内
$aop->isCheckAlipayPublicCert = true;
//调用getCertSN获取证书序列号
$aop->appCertSN = $aop->getCertSN($appCertPath);
//调用getRootCertSN获取支付宝根证书序列号
$aop->alipayRootCertSN = $aop->getRootCertSN($rootCertPath);
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

