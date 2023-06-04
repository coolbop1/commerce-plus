<?php

namespace App\Models;

use App\Notifications\OrderProcessed;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Customer extends Model
{
    use HasFactory, Notifiable;
    protected $fillable = [
        'customer_name', 'user_id', 'address', 'state_id', 'store_id', 'phone', 'local_govt_id'
    ];

    public $prefers_sms = true;
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Route notifications for the Vonage channel.
     */
    public function routeNotificationForVonage(OrderProcessed $notification): string
    {
        return $this->phone;
    }

    public function state()
    {
        return $this->belongsTo(States::class);
    }

	public function lga()
    {
        return $this->belongsTo(LocalGovt::class, 'local_govt_id');
    }

    public function sendSms($order) 
    {
        $message = "Your order with code : ".$order->order_code." has been accepted and processed";
        // return (new VonageMessage)
        //             ->content($message);
        // $ch = curl_init();
        // //curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.africastalking.com/version1/messaging');
        // curl_setopt($ch, CURLOPT_URL, 'https://api.africastalking.com/version1/messaging');
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
        // curl_setopt($ch, CURLOPT_HTTPHEADER, [
        //     'Accept: application/json',
        //     'Content-Type: application/x-www-form-urlencoded',
        //     'apiKey: c26926196b2d8e2c15eb9ee161e8e954d80b70e07c7c0fa9efa1bd8a4e167a31',
        // ]);
        // //curl_setopt($ch, CURLOPT_POSTFIELDS, 'username=MyAppUsername&to=%2B254711XXXYYY,%2B254733YYYZZZ&message=Hello%20World!&from=myShortCode');
        // curl_setopt($ch, CURLOPT_POSTFIELDS, 'username=hubplus&to=%2B2348104168225&message='.$message);

        // $response = curl_exec($ch);

        // curl_close($ch);







        // $curl = curl_init();

		// 	curl_setopt_array($curl, array(
		// 	CURLOPT_URL => 'https://termii.com/api/sms/send',
		// 	CURLOPT_RETURNTRANSFER => true,
		// 	CURLOPT_ENCODING => '',
		// 	CURLOPT_MAXREDIRS => 10,
		// 	CURLOPT_TIMEOUT => 0,
		// 	CURLOPT_FOLLOWLOCATION => true,
		// 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
		// 	CURLOPT_CUSTOMREQUEST => 'GET',
		// 	CURLOPT_POSTFIELDS =>'{

		// 	"to": "2348104168225",
		// 	"from": "hubplus",
		// 	"sms": "Hi there, testing Termii",
		// 	"type": "plain",
		// 	"channel": "generic",
		// 	"api_key": "TLlfjrkIHP8NrRwGMDpkGX5tmhLKZYeFVVzUid7apTcvu913oQnaMdZr3f8Qpd",

		// 	}',
		// 	CURLOPT_HTTPHEADER => array(
		// 	'Content-Type: application/json'
		// 	),
		// 	));

		// 	$response = curl_exec($curl);

		// 	curl_close($curl);




        $curl = curl_init();

			curl_setopt_array($curl, array(
			CURLOPT_URL => 'https://termii.com/api/sms/send',
			CURLOPT_RETURNTRANSFER => true,
			CURLOPT_ENCODING => '',
			CURLOPT_MAXREDIRS => 10,
			CURLOPT_TIMEOUT => 0,
			CURLOPT_FOLLOWLOCATION => true,
			CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
			CURLOPT_CUSTOMREQUEST => 'GET',
			CURLOPT_POSTFIELDS =>'{

			"to": "2348104168225",
			"from": "hubplus",
			"sms": "Hi there, testing Termii",
			"type": "plain",
			"channel": "generic",
			"api_key": "TLlfjrkIHP8NrRwGMDpkGX5tmhLKZYeFVVzUid7apTcvu913oQnaMdZr3f8Qpd",

			}',
			CURLOPT_HTTPHEADER => array(
			'Content-Type: application/json'
			),
			));

			$response = curl_exec($curl);

			curl_close($curl);
        return $response;
    }
}
