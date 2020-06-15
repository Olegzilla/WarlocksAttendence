<?php

$raid = $_POST['raid'];
$datahora = $_POST['datahora'];
$nome1 = $_POST['nome1'];
$nome2 = $_POST['nome2'];
$nome3 = $_POST['nome3'];

$nomes = ''.$nome1.'"\\n"'.$nome2.'"\\n"'.$nome3;

//=======================================================================================================
// Create new webhook in your Discord channel settings and copy&paste URL
//=======================================================================================================

$webhookurl = "https://discordapp.com/api/webhooks/721569388490260531/fjLmWBZ0uScEnM3YrvPgwy3vZYExQQQsrJyBKrwR2v2k96UNbYofS2rHy2IL93rnZHQl";

//=======================================================================================================
// Compose message. You can use Markdown
// Message Formatting -- https://discordapp.com/developers/docs/reference#message-formatting
//========================================================================================================

$timestamp = date("c", strtotime("now"));

$json_data = json_encode([
    // Message
    "content" => "<@&712690619793014804>",
    
    // Username
    "username" => "O Contrato",

    // Avatar URL.
    // Uncoment to replace image set in webhook
    "avatar_url" => "https://cdn.discordapp.com/icons/624423177933815818/e3008ad125c27fc0155cddb66e2c9268.png",

    // Text-to-speech
    "tts" => false,

    // File upload
    // "file" => "",

    // Embeds Array
    "embeds" => [
        [
            // Embed Title
            "title" => 'Warlocks em '. $raid,

            // Embed Type
            "type" => "rich",

            // Embed Description
            "description" => "Um novo evento da guilda foi criado. Lembre-se de confirmar presença!",

            // URL of title link
            //"url" => "https://ocontrato.com.br/",

            // Timestamp of embed must be formatted as ISO8601
            "timestamp" => $timestamp,

            // Embed left border color in HEX
            "color" => hexdec( "FE5639" ),

            // Footer
            "footer" => [
                "text" => "O Contrato",
                "icon_url" => "https://cdn.discordapp.com/icons/624423177933815818/e3008ad125c27fc0155cddb66e2c9268.png?size=128"
            ],

            // Image to send
            //"image" => [
            //    "url" => "https://ru.gravatar.com/userimage/28503754/1168e2bddca84fec2a63addb348c571d.jpg?size=600"
            //],

            // Thumbnail
            "thumbnail" => [
                "url" => "https://cdn.discordapp.com/icons/624423177933815818/e3008ad125c27fc0155cddb66e2c9268.png?size=128"
            ],

            // Author
            //"author" => [
            //    "name" => "Nome de quem postou",
            //    "url" => "https://ocontrato.com.br/"
            //],

            // Additional Fields array
            "fields" => [
                [
                    "name" => "**RAID**",
                    "value" => $raid,
                    "inline" => true
                ],
                [
                    "name" => "**DATA E HORÁRIO**",
                    "value" => $datahora,
                    "inline" => true
                ],
                [
                    "name" => "**JOGADORES**",
                    "value" => "$nome1 \n $nome2 \n $nome3",
                    "inline" => false
                ]
            ]
        ]
    ]

], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$ch = curl_init( $webhookurl );
curl_setopt( $ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
curl_setopt( $ch, CURLOPT_POST, 1);
curl_setopt( $ch, CURLOPT_POSTFIELDS, $json_data);
curl_setopt( $ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt( $ch, CURLOPT_HEADER, 0);
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1);

$response = curl_exec( $ch );
// If you need to debug, or find out why you can't send message uncomment line below, and execute script.
// echo $response;
curl_close( $ch );
header('Location: index.php');
?>