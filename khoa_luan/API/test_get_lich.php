<?php
$course = array(
    '1' => array(
    'start' => '4',
    'end' =>' 6'
    ),
    '2' => array(
    'start' => '14',
    'end' => '19'
    )
);
foreach($course as $k => $v){
    echo "{$k}<br/>";
    echo "--{$v['start']}<br/>";
    echo "--{$v['end']}<br/>";
}
?>