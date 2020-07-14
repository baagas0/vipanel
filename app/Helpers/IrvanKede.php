<?php

namespace App\Helpers;

use Ixudra\Curl\Facades\Curl;

class IrvanKede
{
	public static function profile()
	{
		$response = Curl::to('https://api.irvankede-smm.co.id/profile')
        ->withData(['api_id' => env('IRVANKEDE_ID'),'api_key' => env('IRVANKEDE_KEY')])
        ->post();

        return json_decode($response);
	}

	public static function services()
	{
		$response = Curl::to('https://api.irvankede-smm.co.id/services')
        ->withData(['api_id' => env('IRVANKEDE_ID'),'api_key' => env('IRVANKEDE_KEY')])
        ->post();

        return json_decode($response);
	}

	public static function order($data = [])
	{
		$response = Curl::to('https://api.irvankede-smm.co.id/order')
        ->withData([
        	'api_id' => env('IRVANKEDE_ID'),
        	'api_key' => env('IRVANKEDE_KEY'),
        	'services' => $data['services'],
        	'target' => $data['services'],
        	'quantity' => $data['quantity'],
        	'custom_comments' => $data['custom_comments'],
        	'custom_link' => $data['custom_link']
        ])->post();

        return json_decode($response);
	}

	public static function status($id)
	{
		$response = Curl::to('https://api.irvankede-smm.co.id/status')
        ->withData([
        	'api_id' => env('IRVANKEDE_ID'),
        	'api_key' => env('IRVANKEDE_KEY'),
        	'services' => $id,
        ])->post();

        return json_decode($response);
	}
}

