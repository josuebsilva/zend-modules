<?php
/**
 * Created by PhpStorm.
 * User: Cypher
 * Date: 9/4/2017
 * Time: 9:20 PM
 */
namespace FirebaseMessaging\Http;

class FirebaseMessaging
{
    private $endpoint = "https://fcm.googleapis.com/fcm/send";
    private $key;

    public function setKey($key){
        $this->key = $key;
    }

    public function send($data, $registration_ids){
        $curl = curl_init();
        $fields = array(
            'registration_ids' => $registration_ids,
            "data" => $data
        );

        $fields  = json_encode($fields);
        $headers = array(
            "Content-Type:application/json",
            "Authorization:key=".$this->key
        );

        curl_setopt ( $curl, CURLOPT_URL, $this->endpoint );
        curl_setopt ( $curl, CURLOPT_POST, true  );
        curl_setopt ( $curl,CURLOPT_SSL_VERIFYPEER, false );
        curl_setopt ( $curl, CURLOPT_HTTPHEADER, $headers  );
        curl_setopt ( $curl, CURLOPT_RETURNTRANSFER, true   );
        curl_setopt ( $curl, CURLOPT_POSTFIELDS, $fields   );


        $rest = curl_exec($curl);
        curl_close($curl);
        return $rest;
    }
}