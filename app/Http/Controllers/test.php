<?php

/*
    ------------git url-----------
    https://github.com/cossou/JasperPHP
    
    run composer
    composer require cossou/jasperphp

    need to install jre in system
    file name: jre-8u271-windows-x64.exe

*/

namespace App\Http\Controllers;

use JasperPHP\JasperPHP; // put here

class test extends Controller
{
    function test_data()
    {
        $input = dirname(dirname(dirname(dirname(__FILE__)))) . "/public/jasperReport/ATYP.jasper";
        
        $myfile = dirname(dirname(dirname(dirname(__FILE__)))) . "/public/jasperReport/admission_151324.txt";
        
        $output = dirname(dirname(dirname(dirname(__FILE__)))) . '//public/jasperReport/admission_151324';
			
        //print_r($output);die;
        $jasper = new JasperPHP;
        
        //$jasper->compile($input)->execute();

        $jasper->process(
					$input,
					$output,
					array('pdf'),
					array(),
					array(
						'driver' => 'json',
						'json_query' => 'data',
						'data_file' => $myfile
					)
				)->execute();
        return response('process complete successfully.');
    }
}
