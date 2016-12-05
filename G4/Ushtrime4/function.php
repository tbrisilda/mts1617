<?php

function f($x, $y)
{
	$results = [];
	
	$array1 = [10, 11, 12, 13, 14, 15];
	
	$array2 = ['Aurel', 'Alisa', 'Mikela', 'Alban', 'Artan'];
	
	if (in_array($x, $array1)) {
		$results['xKey'] = array_search($x, $array1);
	}
	
	if (in_array($y, $array2)) {
		$results['yKey'] = array_search($y, $array2);
	}
	
	return $results;
}