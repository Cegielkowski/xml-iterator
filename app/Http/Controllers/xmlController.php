<?php


namespace App\Http\Controllers;

use App\Classes\XmlHandler;
use Illuminate\Http\Request;
use SimpleXMLElement;

class xmlController
{
    public function create(Request $request) {
        $file = $request->file('xml');
        $employee = $request->file('employee');
        $employeeJson = file_get_contents($employee->getPathname());
        $newEmployee = json_decode($employeeJson,true);
        $xmlString = file_get_contents($file->getPathname());

        $xmlReader = new XmlHandler(trim($xmlString));
        $xmlReader->insertEmployee($newEmployee);
        $xmlData = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        $xmlReader->arrayToXML($xmlReader->getXmlArray(),$xmlData);
        $xmlReader->save($xmlData);

        return response(['newfile' => 'http://localhost/updated.xml'], 200);
    }

    public function delete(Request $request) {
        $name = $request->get('name');
        $file = $request->file('xml');
        $xmlString = file_get_contents($file->getPathname());
        $xmlReader = new XmlHandler(trim($xmlString));
        $xmlReader->removeEmployee($name);
        $xmlData = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        $xmlReader->arrayToXML($xmlReader->getXmlArray(),$xmlData);
        $xmlReader->save($xmlData);

        return response(['newfile' => 'http://localhost/updated.xml'], 200);
    }

    public function createNode(Request $request) {
        $name = $request->get('name');
        $file = $request->file('xml');
        $newNode = $request->file('node');
        $nodeJson = file_get_contents($newNode->getPathname());
        $newNode = json_decode($nodeJson,true);
        $xmlString = file_get_contents($file->getPathname());
        $arrayKey = array_key_first($newNode);
        $xmlReader = new XmlHandler(trim($xmlString));
        $xmlReader->insertNode($arrayKey, $newNode[$arrayKey], $name);
        $xmlData = new SimpleXMLElement('<?xml version="1.0"?><data></data>');
        $xmlReader->arrayToXML($xmlReader->getXmlArray(),$xmlData);
        $xmlReader->save($xmlData);

        return response(['newfile' => 'http://localhost/updated.xml'], 200);
    }

}
