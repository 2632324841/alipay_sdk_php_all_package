## 支付宝官方SDK封装包

1. 此包主要用于在官方包的基础之上进行psr-4引用方式
2. 主要用途方便框架上使用

### 通过Composer在线安装依赖

```composer require deadlymous/alipay_sdk_php_all_package```

### 官方实例

```php
<?php

require_once '../AopClient.php';
require_once '../AopCertification.php';
require_once '../request/AlipayTradeQueryRequest.php';
require_once '../request/AlipayTradeWapPayRequest.php';
require_once '../request/AlipayTradeAppPayRequest.php';
//以文件路径加载引用

/**
 * 证书类型AopClient功能方法使用测试
 * 1、execute 调用示例
 * 2、sdkExecute 调用示例
 * 3、pageExecute 调用示例
 */


//1、execute 使用
$aop = new AopClient ();

$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
$aop->appId = '你的appid';
$aop->rsaPrivateKey = '你的应用私钥';
$aop->alipayrsaPublicKey = '你的支付宝公钥';
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset = 'utf-8';
$aop->format = 'json';

$request = new AlipayTradeQueryRequest ();
$request->setBizContent("{" .
    "\"out_trade_no\":\"20150320010101001\"," .
    "\"trade_no\":\"2014112611001004680 073956707\"," .
    "\"org_pid\":\"2088101117952222\"," .
    "      \"query_options\":[" .
    "        \"TRADE_SETTE_INFO\"" .
    "      ]" .
    "  }");
$result = $aop->execute($request);
echo $result;

```
### 封装包实例
```php
<?php
require_once 'vendor/autoload.php';
use aop\AopClient;
use aop\request\AlipayTradeWapPayRequest;

//以命名空间加载引用

/**
 * 证书类型AopClient功能方法使用测试
 * 1、execute 调用示例
 * 2、sdkExecute 调用示例
 * 3、pageExecute 调用示例
 */

//1、execute 使用
$aop = new AopClient ();

$aop->gatewayUrl = 'https://openapi.alipay.com/gateway.do';
$aop->appId = '你的appid';
$aop->rsaPrivateKey = '你的应用私钥';
$aop->alipayrsaPublicKey = '你的支付宝公钥';
$aop->apiVersion = '1.0';
$aop->signType = 'RSA2';
$aop->postCharset = 'utf-8';
$aop->format = 'json';

$request = new AlipayTradeQueryRequest ();
$request->setBizContent("{" .
    "\"out_trade_no\":\"20150320010101001\"," .
    "\"trade_no\":\"2014112611001004680 073956707\"," .
    "\"org_pid\":\"2088101117952222\"," .
    "      \"query_options\":[" .
    "        \"TRADE_SETTE_INFO\"" .
    "      ]" .
    "  }");
$result = $aop->execute($request);
echo $result;

```

### 总结一下
- 更新内容：更新同步支付宝sdk，调整错误异常直接exit或die方式。
- 支付宝也有个通用版和Easy版SDK，但是目前Easy版SDK还没有完全移植过来，只有部分API。
- 通用SDK版本不适合cli开发方式，部分代码错误或参数判断直接exit或die，会直接退出进程，如果要使用建议手动修改。
- 支付宝每一种调用方式和执行方式都不一样，所以在使用前可以查看[官方文档](https://opendocs.alipay.com/mini/02c7hz)根据需求来使用
- 有兴趣可以去[官方通用版](https://github.com/alipay/alipay-sdk-php-all)或[官方Easy版本](https://github.com/alipay/alipay-easysdk/tree/master/php)了解下
