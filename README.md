# 顺丰快递丰桥平台快速集成

### 使用方法

丰桥官方文档：[链接 ](https://qiao.sf-express.com/)

- 订单确认、取消接口

```
use Bangbangda\FengQiao\Requests\OrderConfirmRequest;
use Bangbangda\FengQiao\ExpressService;

$orderConfirmRequest = new OrderConfirmRequest;
// 参数 客户编号、电商订单号、状态：1:确认 2:取消
$orderConfirmRequest->setReplaceValue([
    'TXYDYSXX', '0812020011751145477', '2'
]);
// 应用校验码
$express = new ExpressService('ZQHeZMADDbse2CdsBK45ZNFLKsdn8fSO');
$result = $express->setRequest($orderConfirmRequest)->sendRequest();
```

- 订单结果查询接口

```
use Bangbangda\FengQiao\Requests\OrderQueryRequest;
use Bangbangda\FengQiao\ExpressService;

$orderQueryRequest = new OrderQueryRequest;
// 参数 客户编号、电商订单号
$orderQueryRequest->setReplaceValue([
    'TXYDYSXX', '0812020011751145477'
]);
// 应用校验码
$express = new ExpressService('ZQHeZMADDbse2CdsBK45ZNFLKsdn8fSO');
$result = $express->setRequest($orderQueryRequest)->sendRequest();
dd($result);
```

- 订单创建

```
$customer = [
    '客户编号', '订单号'
];
// 发件人信息
$formUser = [
    '公司名', '联系人', '电话', '手机', '省份', '城市',
    '区县', '详细地址'
];
// 收件人信息
$toUser = [
    '公司名', '联系人', '电话', '手机', '省份', '城市',
    '区县', '详细地址'
];
// 订单信息
$order = [
    '支付方式', '月结卡号', '商品名称'
];


$orderQueryRequest = new OrderRequest;
$orderQueryRequest->setReplaceValue(array_merge($customer, $formUser, $toUser, $order));
// 应用校验码
$express = new ExpressService('ZQHeZMADDrkCdsBK45ZNFLKtFVxn8fSO');
$result = $express->setRequest($orderQueryRequest)->sendRequest();
```