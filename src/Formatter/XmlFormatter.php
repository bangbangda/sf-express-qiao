<?php
namespace Aries\FengQiao\Formatter;


/**
 * Class XmlFormatter
 * @package Aries\FengQiao\Formatter
 */
abstract class XmlFormatter implements Formatter
{

    private $replaceValue = null;

    /**
     * @inheritDoc
     */
    public function getStubFile(): string
    {
        // TODO: Implement getStubFile() method.
    }

    /**
     * @inheritDoc
     */
    public function format(): string
    {
        $stubFile = file_get_contents($this->getStubFile());

        return str_replace(
            $this->getReplaceKey(),
            $this->getReplaceValue(),
            $stubFile
        );
    }

    /**
     * @inheritDoc
     */
    public abstract function getReplaceKey(): array;

    /**
     * @inheritDoc
     */
    public function getReplaceValue(): array
    {
        return $this->replaceValue;
    }

    public function setReplaceValue(array $replaceValue)
    {
        $this->replaceValue = $replaceValue;
    }

    public function xmlToArray(string $xml) : array
    {
        $obj = simplexml_load_string($xml);

        return $this->normalize($obj);
    }


    private function normalize($obj)
    {
        $result = null;

        if (is_object($obj)) {
            $obj = (array) $obj;
        }

        if (is_array($obj)) {
            foreach ($obj as $key => $value) {
                $res = self::normalize($value);
                if (('@attributes' === $key) && ($key)) {
                    $result = $res; // @codeCoverageIgnore
                } else {
                    $result[$key] = $res;
                }
            }
        } else {
            $result = $obj;
        }

        return $result;
    }
}