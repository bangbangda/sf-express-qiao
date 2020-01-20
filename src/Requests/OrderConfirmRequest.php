<?php
namespace Aries\FengQiao\Requests;

use Aries\FengQiao\Formatter\XmlFormatter;

/**
 * 订单确认、取消
 *
 * Class OrderConfirmRequest
 * @package Aries\FengQiao
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