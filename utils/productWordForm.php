<?php 

function productWordForm($count) {
	$count %= 100;
	$countLastDigit = $count % 10;

	if ($count >= 11 && $count <= 19) return 'товаров';
	if ($countLastDigit >= 2 && $countLastDigit <= 4) return 'товара';
	if ($countLastDigit === 1) return 'товар';

	return 'товаров';
}