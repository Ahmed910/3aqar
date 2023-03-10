<?php

namespace App\Services;

class SMSService
{

    public static function send(array $sender = [], array $data,array $date_time=[] , $service_provider = 'masagat')
    {
        switch ($service_provider) {
            case 'hisms':
                $validate_msg = self::sendHisms($sender , $data , $date_time );
                break;
            case 'sms_gateway':
                $validate_msg = self::sendSMSGateway($sender , $data , $date_time );
                break;
            case 'net_powers':
                $validate_msg = self::sendNetPowers($sender , $data , $date_time );
                break;
            case 'masagat':

                $validate_msg = self::sendOverMesagat($data);
                break;
            default:
                $validate_msg = self::sendHisms($sender , $data , $date_time );
                break;
        }
        return $validate_msg;
    }


    public static function sendHisms($sender , $data , $date_time)
    {
        $url = "http://hisms.ws/api.php?send_sms&username=" . $sender['username'] . "&password=" . $sender['password'] . "&numbers=" . $data['numbers'] . "&sender=" . $sender['sender_name'] . "&message=" . $data['message'] . "&date=" . $date_time['date'] . "&time=" . $date_time['time'];

        $response = (int) file_get_contents($url);
        $result = self::validate_response($response);
        return  $msg = ['response' => $response, 'result' => $result];
    }

   public static function sendOverMesagat($data){

        // dd($data);
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'https://www.msegat.com/gw/sendsms.php', [
            'headers' => [
                'Accept' => 'application/json',
                'Content-Type' => 'application/json',
                'Accept-Language' => app()->getLocale() == 'ar' ? 'ar-Sa' : 'en-Uk'
            ],
            'body' => json_encode($data),
        ]);
        $response = json_decode($response->getBody()->getContents(),true);
        // dd($response);

        // $result = self::validate_SMS_response($response['ErrorCode']);
        return  $msg = ['response' => $response];
    }


    public static function sendSMSGateway($sender , $data , $date_time)
    {
        $url = "https://apps.gateway.sa/vendorsms/pushsms.aspx?user=" . $sender['username'] . "&password=" . $sender['password'] . "&msisdn=" . $data['numbers'] . "&sid=" . $sender['sender_name'] . "&msg=" . $data['message'] . "&fl=0&dc=8";

        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', $url);
        $response = json_decode($response->getBody()->getContents(),true);
        $result = self::validate_SMS_response($response['ErrorCode']);
        return  $msg = ['response' => $response, 'result' => $result];
    }

    public static function sendNetPowers($sender , $data , $date_time)
    {
        $url = "Http://sms.netpowers.net/http/api.php?id=" . $sender['username'] . "&password=" . $sender['password'] . "&to=" . $data['numbers'] . "&sender=" . $sender['sender_name'] . "&msg=" . $data['message'];

        $response = file_get_contents($url);
        $result =  "???? ?????? ?????????????? ???????? ?????? ???????? ???? ???????? ?????????? ????????????";
        if(str_contains($response,'Sent')){
            $result =  "???? ?????????????? ??????????";
        }
        return  $msg = ['response' => $response, 'result' => $result];
    }

    protected static function validate_response($response)
    {
      $result = '';
      switch ($response) {
        case 1:
          $result = '?????? ???????????????? ?????? ????????';
          break;
        case 2:
          $result = '???????? ???????????? ?????? ??????????';
          break;
        case 3:
          $result = '???? ?????????? ?????? ????????????';
          break;
        case 4:
          $result = '???????????? ??????????';
          break;
        case 5:
          $result = '???????????? ??????????';
          break;
        case 6:
          $result = '?????? ???????????? ?????? ????????';
          break;
        case 7:
          $result = '?????? ???????????? ?????? ????????';
          break;
        case 8:
          $result = '?????????????? ?????????? ?????? ???????? ????????????';
          break;
        case 9:
          $result = '???????????? ????????';
          break;
        case 10:
          $result = '???????? ?????????????? ?????? ??????????';
          break;
        case 10:
          $result = '???????? ?????????? ?????? ??????????';
          break;
        case 404:
          $result = '???? ?????? ?????????? ???????? ?????????????????? ????????????????';
          break;
        case 403:
          $result = '???? ?????????? ?????? ?????????????????? ????????????????';
          break;
        case 504:
          $result = '???????????? ????????';
          break;
      }
      return $result;
    }

    protected static function validate_SMS_response($response)
    {
       return trans('dashboard.sms.response_code.'.$response);
    }


}
