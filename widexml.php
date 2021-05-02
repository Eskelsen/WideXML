<?php

# WideXML by Eskelsen eskelsen@yahoo.com

# XML Writer
function xmlPlacer($in,$cdata = false) {
    $xml = new XmlWriter();
    $xml->openMemory();
    $xml->setIndent(true);
    $xml->startDocument('1.0', 'UTF-8');

    $key = key($in);
    
    xmlNodefy($xml,$key,$in[$key],$cdata);
    
    return $xml->outputMemory(true);
}

# XML Writer Nodefy (xmlPlacer auxiliary function)
function xmlNodefy($xml,$key,$value,$cdata = false){
    if (is_array($value)) {
        $xml->startElement($key);
        foreach ($value as $tag => $content) {
            xmlNodefy($xml,$tag,$content,$cdata);
        }
        $xml->endElement();
    } else {
        if ($cdata){
            $xml->startElement($key);
            $xml->writeCdata($value);
            $xml->endElement();
        } else {
            $xml->writeElement($key,$value);
        }
    }
}

# XML Reader
function xmlGather($in,$node){
    $file = new XMLReader();
    $file->open($in);
    $i = 0;
    while ($file->read()) {
        if ($file->nodeType == XMLReader::ELEMENT) {
            if ($file->name==$node) {
                $xml = $file->readOuterXml();
                $json = json_encode(simplexml_load_string($xml,null,LIBXML_NOCDATA));
                $m[$i] = json_decode($json,true);
                $file->next();
                $i++;
            }
        }
    }
    $file->close();
    return $m;
}
