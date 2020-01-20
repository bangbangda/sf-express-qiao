<?php
namespace Bangbangda\FengQiao\Requests;

use Bangbangda\FengQiao\Formatter\XmlFormatter;

/**
 * 订单确认、取消
 *
 * Class OrderConfirmRequest
 * @package Bangbangda\FengQiao
 */
class OrderConfirmRequest extends XmlFormatter
{

    public function getStubFile(): string
    {
        return __DIR__.'/../Formatter/stubs/order_confirm.stub';
    }

    /**
     * @inheritDoc
     */
    public function getReplaceKey(): array
    {
        return ['CustomerCode', 'OrderId', 'DealType'];
    }
}