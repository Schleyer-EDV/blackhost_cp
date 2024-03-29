<?php
include BASE_PATH . 'vendor/autoload.php';

$SQL5 = $db->prepare("SELECT * from `cloudserver_packs` WHERE `id` = :id");
$packid = $_POST['packid'];
$SQL5->execute(array(":id" => $packid));
while ($ncpack = $SQL5->fetch(PDO::FETCH_ASSOC)) {

    for ($i = 0, $z = strlen($a = '1234567890') - 1, $b = $a{rand(0, $z)}, $i = 1; $i != 5; $x = rand(0, $z), $b .= $a{$x}, $b = ($b{$i} == $b{$i - 1} ? substr($b, 0, -1) : $b), $i = strlen($b)) ;

    for ($i = 0, $z = strlen($a = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz1234567890#') - 1, $s = $a{rand(0, $z)}, $i = 1; $i != 32; $x = rand(0, $z), $s .= $a{$x}, $s = ($s{$i} == $s{$i - 1} ? substr($s, 0, -1) : $s), $i = strlen($s)) ;

    for ($i = 0, $z = strlen($a = '1234567890') - 1, $b = $a{rand(0, $z)}, $i = 1; $i != 5; $x = rand(0, $z), $b .= $a{$x}, $b = ($b{$i} == $b{$i - 1} ? substr($b, 0, -1) : $b), $i = strlen($b)) ;


    $nc_username = $username . $b;
    $nc_pass = $s;
    $nc_speicher = $ncpack['nc_pack_speicher'];

    $nc_url = "https://nextcloud01.black-host.eu";

    $db_price = $ncpack['nc_pack_price'];

}

if (isset($_POST['order'])) {

    $error = null;

    if (!$user->sessionExists($_COOKIE['session_token'])) {
        $error = 'Bitte logge dich erst ein';
    }

    $runtime = 30;
    $proname = "Nextcloud";

    $state = 'active';
    $price = $db_price * $validate->getIntervalFactor($runtime);
    $price = number_format($price, 2);


    if ($amount < $price) {
        $error = 'Du hast leider nicht genügend Guthaben';
        $_SESSION['error_msg'] = 'Du hast leider nicht genügend Guthaben';
        header('Location: ' . env('URL') . 'accounting/charge');
        die();
    }

    if ($price == 1000) {
        $error = 'Ungültige Anfrage bitte versuche es erneut (1001)';
    }

    if (empty($error)) {

// Curl execute (START)
        $nextcloud->create($nc_username, $nc_pass, $nc_speicher);
// Curl execute (ENDE)

        $date = new DateTime(null, new DateTimeZone('Europe/Berlin'));
        $date->modify('+' . $runtime . ' day');
        $expire_at = $date->format('Y-m-d H:i:s');

        $SQL = $db->prepare("INSERT INTO `cloudserver` 
		
		(
		`user_id`, 

		`nc_username`, 
		`nc_pass`, 
		`nc_speicher`,
		`nc_url`,

		`state`, 
		`expire_at`, 
		`price`
		) 
		
		VALUES (?,?,?,?,?,?,?,?)");

        $SQL->execute(array(
            $userid,

            $nc_username,
            $nc_pass,
            $nc_speicher,
            $nc_url,

            $state,
            $expire_at,
            $price
        ));

        $user->removeMoney($price, $userid);
        $user->addTransaction($userid, '-' . $price, $proname . ' Bestellung');

        $discord->callWebhook('<@&874784920332017715> Soeben wurde eine neue Nextcloud bestellt von ' . $username);

        $_SESSION['success_msg'] = 'Vielen Dank! Dein Produkt ist nun Einsatzbereit.';
        header('Location: ' . env('URL') . 'manage/nextcloud');


    } else {
        $_SESSION['error_msg'] = $error;
        header('Location: ' . env('URL') . 'order/nextcloud');
    }

}