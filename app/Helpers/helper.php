<?php

function urlTemplate()
{
	return asset('dist').'/';
}

function urlActive($url1,$url2,$url3)
{
	if ($url1 == 'admin' && $url2 ) {
		return 'active';
	}
}

define('ADMIN', 1);
define('PETUGAS', 2);
define('MURID', 3);