<?php
namespace App;

const TOKEN = '1488234923:AAGB-sAoibttcnn9mlsJMXhfNW11gA-to0Q';
const BASE_URL = 'https://api.telegram.org/bot'. TOKEN .'/';
const HELLO = array('привіт', 'привіт)', 'привіт!', 'здоров', 'здоров!', 'здоров)');

function sendRequest($method, $params = []){

    if(!empty($params)){
        $url = BASE_URL . $method .'?'. http_build_query($params);
    }
    else{
        $url = BASE_URL . $method;
    }

    return json_decode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);
}

function checkUpdates(){

    // update_id 577153588
    $response = sendRequest('getUpdates', array('offset' => 577153588));
    $results =  array_reverse($response['result']);

    if ($response['ok']){

        $params = [];
        $ids = [];

        foreach ($results as $result){

            if(strtotime('+30 sec') - $result['message']['date'] < 7){
                if(isset($result['message']['entities']) && $result['message']['text'] === '/start'){

                    $params = array(
                        'chat_id' => $result['message']['chat']['id'],
                        'text' => 'Привіт я тестовий бот, який любить вітатись. Тож скажи мені, будь ласка, "Привіт"'
                    );
                }
                elseif(in_array(mb_strtolower(trim($result['message']['text'])), HELLO)){

                    $params = array(
                        'chat_id' => $result['message']['chat']['id'],
                        'text' => 'Оу, привіііт))) Я дуже радий з тобою привітатись, '. $result['message']['from']['first_name'] .' ;)'
                    );
                }
                elseif(!isset($result['message']['entities']) && !in_array(mb_strtolower(trim($result['message']['text'])), HELLO)){

                    $params = array(
                        'chat_id' => $result['message']['chat']['id'],
                        'text' => 'Це добре, що ти мені написав, але привітайся зі мною, будь ласка)'
                    );
                }

                if(!in_array($params['chat_id'], $ids)){
                    array_push($ids, $params['chat_id']);
                }
                else{
                    continue;
                }

                $response = sendRequest('sendMessage', $params);
            }
            else{
                break;
            }
        }
    }
    else{
        echo 'Oops. We have some error: '. $response['error_code'];
    }

    echo json_encode($response);
}

if (isset($_POST['check'])){
    checkUpdates();
    exit();
}


$content_view = 'views/task_4.php';
$title = 'Task 4';
include 'views/main.php';