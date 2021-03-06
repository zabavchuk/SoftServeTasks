<?php
namespace App;

require_once('../vendor/autoload.php');
require('../env.php');

define('BASE_URL','https://api.telegram.org/bot'. $_ENV['TG_TOKEN'] .'/');
const HELLO = array('привіт', 'привіт)', 'привіт!', 'здоров', 'здоров!', 'здоров)');

/**
 * Class TGBot
 * @package App
 */
class TGBot
{

    /**
     * @param string $method
     * @param array $params
     * @return mixed
     */
    public static function sendRequest(string $method, array $params = [])
    {
        if(!empty($params)){
            $url = BASE_URL . $method .'?'. http_build_query($params);
        }
        else{
            $url = BASE_URL . $method;
        }

        return json_decode(file_get_contents($url), JSON_OBJECT_AS_ARRAY);
    }

    public static function checkUpdates()
    {
        // update_id 577153602
        $response = self::sendRequest('getUpdates', array('offset' => 577153602));
        $results =  array_reverse($response['result']);

        if ($response['ok']){

            $params = [];
            $ids = [];

            foreach ($results as $result){

                var_dump(strtotime('+30 sec') - $result['message']['date']);
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

                    $response = self::sendRequest('sendMessage', $params);
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
}

if (isset($_POST['check'])){
    TGBot::checkUpdates();
    exit();
}

$content_view = 'Views/task_4.php';
$title = 'Task 4';
include 'Views/main.php';