<?php

# Index by Eskelsen eskelsen@yahoo.com

include 'widexml.php';

# Making a XML from array
$in['externaltag'] = [
    'jobid' => '005d62d0b476',
    'title' => 'Seja a voz oficial da ... onde estiver.',
    'city' => 'Maceió',
    'state' => 'Alagoas',
    'country' => 'br',
    'date' => '2021-03-23T08:36:31Z',
    'inutils' => [
          'currency' => 'BRL',
          'cpc' => '0.36',
          'nested' => [
                'oinc' => '123',
                'pig' => 'Palmeiras'
          ]
    ]
];

// $out = xmlPlacer($in,false);    # xmlPlacer(array,CDATA)
// header('Content-Type: text/xml');
// echo $out;

# Making array from XML
$file = 'malldata.xml';
$node = 'job';                  # This is like a 'row' on XML document. Here, a job list.
// $m = xmlGather($file,$node); # xmlGather(filename,individual record node name)
// var_dump($m);

# Uncomment one or another to see the output, no both.
