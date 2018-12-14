<?php

	/*----POTENTIAL_ROI CALC------*/
	foreach ($dataArray as &$value) {
		$value['POTENTIAL_ROI'] = ((($value['CURRENT_PRICE']-$value['ICO_PRICE' ]) / $value['ICO_PRICE']) * 100);
	}
	/*-------------------------*/
	/*-------INVEST CALC-------*/
	foreach ($dataArray as &$value) {
		$value['INVEST'] = ($value['ICO_PRICE']*$value['ICO_QTY']);
	}
	/*-------------------------*/
	/*-------WALLET CALC-------*/
	$sum = 0; 
	foreach($dataArray as &$value) {    
		$sum+= $value['INVEST']; 
	}
	foreach($dataArray as &$value) {
		$value['WALLET'] = $sum;
	}
	/*-------------------------*/
	/*-------PROFIT CALC-------*/
	foreach ($dataArray as &$value) {
		$value['PROFIT'] = (($value['CURRENT_PRICE']-$value['ICO_PRICE'])*$value['ICO_QTY']);
	}
	$sum = 0; 
	foreach($dataArray as &$value) {    
		$sum+= $value['PROFIT']; 
	}
	foreach($dataArray as &$value) {
		$value['PROFIT'] = $sum;
	}
	/*--------------------------------*/
	/*-------% FROM WALLET CALC-------*/
	foreach ($dataArray as &$value) {
		$value['PER_FROM_WALLET'] = (($value['INVEST'] / $value['WALLET']) * 100);
	}
	/*---------------------------------*/
	/*-------ICO PROFIT % CALC %-------*/
	foreach ($dataArray as &$value) {
		$value['ICO_PROFIT_PER'] = (($value['CURRENT_PRICE'] - $value['ICO_PRICE']) * $value['ICO_QTY']);
	}
	$sum = 0; 
	foreach($dataArray as &$value) {    
		$sum+= $value['ICO_PROFIT_PER']; 
	}
	foreach($dataArray as &$value) {
		$value['ICO_PROFIT_PER'] = $sum;
	}
	foreach ($dataArray as &$value) {
		$value['ICO_PROFIT_PER'] = (($value['ICO_PROFIT_PER'] / $value['WALLET']) * 100);
	}
	/*--------------------------------*/

 ?>