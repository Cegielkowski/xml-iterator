<?php


namespace App\Classes;

use SimpleXMLElement;

final class XmlHandler extends XmlReader
{
    public function __construct(string $stringXml)
    {
        parent::__construct($stringXml);
    }

    public function getXmlArray(): array
    {
        return parent::getXmlArray();
    }

    protected function setXmlArray(array $xmlArray)
    {
        parent::setXmlArray($xmlArray);
    }

    protected function readXml(string $XML): array
    {
        return parent::readXml($XML);
    }

    public function arrayToXML($data, &$xml_data)
    {
        parent::arrayToXML($data, $xml_data);
    }

    public function insertEmployee(array $newEmployee)
    {
        parent::insertEmployee($newEmployee);
    }

    public function removeEmployee(string $name)
    {
        parent::removeEmployee($name);
    }

    public function save(SimpleXMLElement $element)
    {
        parent::save($element);
    }

    public function insertNode(string $name, $content, string $nameOfEmployee) {
        $xmlArray = $this->getXmlArray();
        foreach ($xmlArray['EMPLOYEES']['EMPLOYEE'] as $key => $value) {
            if ($value['NAME'] == $nameOfEmployee) {
                $xmlArray['EMPLOYEES']['EMPLOYEE'][$key][$name] = $content;
            }
        }
        $this->setXmlArray($xmlArray);
    }

}
