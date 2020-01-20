<?php
namespace Bangbangda\FengQiao\Formatter;

/**
 * Interface Formatter
 * @package Bangbangda\FengQiao\Formatter
 */
interface Formatter
{

    /**
     * 获取丰桥接口请求模板文件
     *
     * @return string
     */
    public function getStubFile() : string;

    /**
     * 格式化丰桥接口请求模板文件
     *
     * @param $replaceKey 替换变量
     * @param $replaceValue 真实参数
     *
     * @return string
     */
    public function format() : string;

    /**
     * 获取请求文件中的变量数组
     *
     * @return array
     */
    public function getReplaceKey() : array;

    /**
     * 获取请求文件中的变量真实值
     *
     * @return array
     */
    public function getReplaceValue() : array;
}