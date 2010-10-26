--TEST--
EDI_EDIFACT_MappingProvider test 01
--FILE--
<?php

require_once dirname(__FILE__) . '/../tests.inc.php';
require_once 'EDI/EDIFACT/MappingProvider.php';

try {
    $node = EDI_EDIFACT_MappingProvider::find('APERAK', 'D95A');
    echo $node->asXml();
} catch (Exception $exc) {
    echo $exc->getMessage();
    exit(1);
}

?>
--EXPECT--
<?xml version="1.0" encoding="utf-8" standalone="yes"?>
<message>
    <defaults>
        <data_element id="0065" value="APERAK"/>
        <data_element id="0052" value="D"/>
        <data_element id="0054" value="95A"/>
        <data_element id="0051" value="UN"/>
    </defaults>
    <segment id="UNH" maxrepeat="1" required="true"/>
    <segment id="BGM" maxrepeat="1" required="true"/>
    <segment id="DTM" maxrepeat="9"/>
    <segment id="FTX" maxrepeat="9"/>
    <segment id="CNT" maxrepeat="9"/>
    <group id="SG1" maxrepeat="9">
        <segment id="RFF" maxrepeat="1" required="true"/>
        <segment id="DTM" maxrepeat="9"/>
    </group>
    <group id="SG2" maxrepeat="9">
        <segment id="NAD" maxrepeat="1" required="true"/>
        <segment id="CTA" maxrepeat="9"/>
        <segment id="COM" maxrepeat="9"/>
    </group>
    <group id="SG3" maxrepeat="999">
        <segment id="ERC" maxrepeat="1" required="true"/>
        <segment id="FTX" maxrepeat="1"/>
        <group id="SG4" maxrepeat="1">
            <segment id="RFF" maxrepeat="1" required="true"/>
            <segment id="FTX" maxrepeat="9"/>
        </group>
    </group>
    <segment id="UNT" maxrepeat="1" required="true"/>
</message>
