<?php
$currPage = 'back_Webspace';
include BASE_PATH.'app/controller/PageController.php';
include BASE_PATH.'app/manager/customer/webspace/manage.php';
?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">

    <div class="d-flex flex-column-fluid">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card shadow mb-5">
                        <div class="card-header"><h4>Übersicht</h4></div>
						<br>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-12 mb-5">
                                    <div class="alert alert-primary col-md-12" role="alert" align="center">
                                        Du bist zufrieden mit unseren Dienstleistungen? <u><a href="https://www.trustpilot.com/evaluate/black-host.eu?stars=5" target="_blank" style="color:white;">Bewerte uns doch!</a></u>
                                    </div>
                                </div>

                                <div class="col-md-2">								
									<h5>Hosting</h5>
									<hr>
                                </div>

                                <div class="col-md-10">								
                                </div>

                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <strong>WebHost Url:</strong>
                                    </p>
                                </div>
                                
                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <span class="ml-2"><a href="<?= $webhostInfos['domainName']; ?>" target="_blank"><?= $webhostInfos['domainName']; ?></a></span>
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <strong>Hostserver:</strong>
                                    </p>
                                </div>
                                
                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <span class="ml-2">WEBHOST-<?= $webhostInfos['id']; ?></span>
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <strong>Webserver ID:</strong>
                                    </p>
                                </div>
                                
                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <span class="ml-2">WEB-#<?= $serverInfos['id']; ?></span>
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <strong>Paket Name:</strong>   
                                    </p>
                                </div>

                                <?php if($serverInfos['ftp_name'] == 'nothing') { ?>
                                    <div class="col-md-6">
                                        <p class="text-muted mb-2 font-13">
                                            <span class="ml-2"><?= $keyhelp->getName($serverInfos['plan_id']); ?></span>
                                        </p>
                                    </div>

                                <?php } else { ?>
                                    <div class="col-md-6">
                                        <p class="text-muted mb-2 font-13">
                                            <span class="ml-2"><?= $plesk->getName($serverInfos['plan_id']); ?></span>
                                        </p>
                                    </div>
                                <?php } ?>
								
								<!-- -->

                                <div class="col-md-12">
									<br>
                                </div>

                                <?php if($serverInfos['ftp_name'] == 'nothing') { ?>

                                    <div class="col-md-3">
                                        <h5>KeyHelp Zugänge</h5>
                                        <hr>
                                    </div>

                                    <div class="col-md-9">
                                    </div>

                                    <div class="col-md-6">
                                        <p class="text-muted mb-2 font-13">
                                            <strong>KeyHelp User:</strong>
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="text-muted mb-2 font-13">
                                            <span class="ml-2"><?= $user->getDataBySession($_COOKIE['session_token'],'username'); ?><?= $userid; ?></span>
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="text-muted mb-2 font-13">
                                            <strong>KeyHelp Passwort:</strong>
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="text-muted mb-2 font-13">
                                        <span class="ml-2">
                                            <span class="noselect" id="keyhelp_password">*********************************</span>
                                            <span style="cursor: pointer;" id="keyhelp_icon" onclick="passwordEye('keyhelp');">
                                                <i class="far fa-eye"></i>
                                            </span>

                                            <i style="cursor: pointer;" class="fas fa-copy copy-btn" data-clipboard-text="<?= $user->getDataBySession($_COOKIE['session_token'],'keyhelp_password'); ?>" data-toggle="tooltip" title="Passwort kopieren"></i>
                                        </span>
                                        </p>
                                    </div>

                                <?php } else { ?>

                                    <div class="col-md-3">
                                        <h5>Plesk Zugänge</h5>
                                        <hr>
                                    </div>

                                    <div class="col-md-9">
                                    </div>

                                    <div class="col-md-6">
                                        <p class="text-muted mb-2 font-13">
                                            <strong>Plesk User:</strong>
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="text-muted mb-2 font-13">
                                            <span class="ml-2"><?= $user->getDataBySession($_COOKIE['session_token'],'username'); ?><?= $userid; ?></span>
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="text-muted mb-2 font-13">
                                            <strong>Plesk Passwort:</strong>
                                        </p>
                                    </div>

                                    <div class="col-md-6">
                                        <p class="text-muted mb-2 font-13">
                                            <span class="ml-2">
                                                <span class="noselect" id="plesk_password">*********************************</span>
                                                <span style="cursor: pointer;" id="plesk_icon" onclick="passwordEye('plesk');">
                                                    <i class="far fa-eye"></i>
                                                </span>

                                                <i style="cursor: pointer;" class="fas fa-copy copy-btn" data-clipboard-text="<?= $user->getDataBySession($_COOKIE['session_token'],'plesk_password'); ?>" data-toggle="tooltip" title="Passwort kopieren"></i>
                                            </span>
                                        </p>
                                    </div>

                                <?php } ?>

								<!-- -->

                                <?php if($serverInfos['ftp_name'] != 'nothing') { ?>
                                <div class="col-md-12">
									<br>
                                </div>

                                <div class="col-md-3">								
									<h5>FTP Zugänge</h5>
									<hr>
                                </div>

                                <div class="col-md-9">								
                                </div>

                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <strong>FTP User:</strong>  
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <span class="ml-2"><?= $serverInfos['ftp_name']; ?></span>  
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <strong>FTP Passwort:</strong>
                                    </p>
                                </div>

                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <span class="ml-2">
                                            <span class="noselect" id="ftp_password">*********************************</span>
                                            <span style="cursor: pointer;" id="ftp_icon" onclick="passwordEye('ftp');">
                                                <i class="far fa-eye"></i>
                                            </span>

                                            <i style="cursor: pointer;" class="fas fa-copy copy-btn" data-clipboard-text="<?= $serverInfos['ftp_password']; ?>" data-toggle="tooltip" title="Passwort kopieren"></i>
                                        </span>
                                    </p>
                                </div>
                                <?php } ?>

								<!-- -->

                                <div class="col-md-12">
									<br>
                                </div>

                                <div class="col-md-2">								
									<h5>Leistung</h5>
									<hr>
                                </div>

                                <div class="col-md-10">								
                                </div>
                                
                                
                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <strong>Preis:</strong> 
                                    </p>
                                </div>
                                
                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <span class="ml-2"><?= $serverInfos['price']; ?>€ / Monat</span>  
                                    </p>
                                </div>
                                
                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <strong>Laufzeit:</strong>  
                                    </p>
                                </div>
                                
                                <div class="col-md-6">
                                    <p class="text-muted mb-2 font-13">
                                        <span class="ml-2">
                                            <span id="countdown">Lädt...</span>
                                        </span>
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow mb-5">
                        <div class="card-header"><h4>Verwaltung</h4></div>
                        <div class="card-body">

                            <!--<form method="post">
                                <button type="submit" class="btn btn-block btn-outline-primary" name="login">
									<b>
										<i class="fas fa-sign-in-alt"></i> Direkter Login</b>
								</button>
                            </form>

                            <br>-->

                            <form method="post">
                                <button type="submit" class="btn btn-block btn-outline-primary" name="login"><b><i class="fas fa-sign-in-alt"></i> Einloggen</b></button>
                            </form>

                            <br>
                            <a class="btn btn-block btn-outline-success" href="<?= $helper->url(); ?>renew/webspace/<?= $id; ?>">
								<b><i class="fas fa-history"></i> Verlängern</b>
							</a>
							
                            <br><br>

                            <br><br>
                            <center>
                                <font size="3">
                                    Beachte dass du um den "Einloggen"-Button nutzen zu können,<br>
                                    Popups für das Kundecenter erlauben musst.
                                </font>
                            </center>
							
                            <br>
                            </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<script>
    let plesk = true;
    let keyhelp = true;
    let ftp = true;

    function passwordEye(type) {
        if(type == 'plesk'){
            if(plesk){
                $('#plesk_password').html("<?= $user->getDataBySession($_COOKIE['session_token'],'plesk_password'); ?>");
                $('#plesk_icon').html('<i class="far fa-eye-slash"></i>');
                plesk = false;
            } else {
                $('#plesk_password').html('*********************************');
                $('#plesk_icon').html('<i class="far fa-eye"></i>');
                plesk = true;
            }
        }

        if(type == 'keyhelp') {
            if(keyhelp){
                $('#keyhelp_password').html("<?= $user->getDataBySession($_COOKIE['session_token'],'keyhelp_password'); ?>");
                $('#keyhelp_icon').html('<i class="far fa-eye-slash"></i>');
                keyhelp = false;
            } else {
                $('#keyhelp_password').html('*********************************');
                $('#keyhelp_icon').html('<i class="far fa-eye"></i>');
                keyhelp = true;
            }
        }

        if(type == 'ftp'){
            if(ftp){
                $('#ftp_password').html("<?= $serverInfos['ftp_password']; ?>");
                $('#ftp_icon').html('<i class="far fa-eye-slash"></i>');
                ftp = false;
            } else {
                $('#ftp_password').html('*********************************');
                $('#ftp_icon').html('<i class="far fa-eye"></i>');
                ftp = true;
            }
        }
    }
</script>
<script>
    var countDownDate = new Date("<?= $serverInfos['expire_at']; ?>").getTime();
    var x = setInterval(function() {

        var now = new Date().getTime();
        var distance = countDownDate - now;

        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);

        if(days == 1){ var days_text = ' Tag' } else { var days_text = ' Tage'; }
        if(hours == 1){ var hours_text = ' Stunde' } else { var hours_text = ' Stunden'; }
        if(minutes == 1){ var minutes_text = ' Minute' } else { var minutes_text = ' Minuten'; }
        if(seconds == 1){ var seconds_text = ' Sekunde' } else { var seconds_text = ' Sekunden'; }

        if(days == 0 && !(hours == 0 && minutes == 0 && seconds == 0)){
            $('#countdown<?= $row["id"]; ?>').html(hours+hours_text+', '+  minutes+minutes_text+' und ' +  seconds+seconds_text);
            if(days == 0 && hours == 0 && !(minutes == 0 && seconds == 0)){
                $('#countdown<?= $row["id"]; ?>').html(minutes+minutes_text+' und '+  seconds+seconds_text);
                if(days == 0 && hours == 0 && minutes == 0 && !(seconds == 0)){
                    $('#countdown<?= $row["id"]; ?>').html(seconds+seconds_text);
                }
            }
        } else {
            $('#countdown').html(days+days_text+', '+  hours+hours_text+', '+  minutes+minutes_text+' und '+  seconds+seconds_text);
        }

        if (distance <= 0) {
            clearInterval(x);
        }
    }, 1000);
</script>