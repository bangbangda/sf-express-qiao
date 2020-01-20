<?php
namespace Bangbangda\FengQiao\Requests;

use Bangbangda\FengQiao\Formatter\XmlFormatter;

/**
 * 订单查询
 *
 * Class OrderQueryRequest
 * @package Bangbangda\FengQiao
 */
class OrderQueryRequest extends XmlFormatter
{

    /**
     * @return string
     */
    public function getStubFile(): string
    {
        return __DIR__.'/../Formatter/stubs/order_query.stub';
    }


    /**
     * @inheritDoc
     */
    public function getReplaceKey(): array
    {
       return ['CustomerCode', 'OrderId'];
    }
}