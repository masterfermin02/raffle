<?php
require_once("classes/global.php");
$sql = "SELECT * FROM raffle where active = 1 LIMIT 1;";
$res = $db->query($sql);

$print_error = false;

if ($res->num_rows > 0) {
    $row = $res->fetch_assoc();
    $name = $row["name"];
    $logo = $row["logo"];
    $id = $row["id"];
} else {
    $print_error = true;
}

?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Rifas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" media="screen" href="css/bootstrap.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/devices.min.css">
    <link rel="stylesheet" type="text/css" media="screen" href="css/style.css">

    <style>
        #cortinas{
            position:relative;
            width: 100%;
            height: 100vh;
            background-color: #333;
            overflow:hidden;
        }

        #curtain1{
            top:0px;
            position:absolute;
            left:0px;
            height:100%;
        }

        #curtain2{
            top:0px;
            position:absolute;
            height:100%;
            right:0px;
        }
    
        #contains_logo{
            position:absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
            width: 500px;
            height:500px;
            border-radius:50%;
            border:2px solid #fff;
            z-index: 222;
        }

        #btn_enter_center{
             position:absolute;
            left: 50%;
            top: 50%;
            transform: translate(-50%,-50%);
        }

        .modal-full {
            min-width: 100%;
            margin: 0;
        }
        
        #slideshow { 
            /* margin: 50px auto;  */
            position: relative; 
            width: 100%; 
            height: 100%; 
            padding: 0px; 
        };

        #timer_show{
            background:red;
        }

        #slideshow > div { 
            position: absolute; 
            top: 0px; 
            left: 0px; 
            right: 0px; 
            bottom: 0px; 
        }

         #slideshow > div > img {
            width: 100%;
            height: 100%;
         }

         #slideshow > #special {
             display:block;
             width: 100%;
             height: 100%;
             position:absolute;
             z-index: 9;
             background: #007bff;
             text-align:center;
         }
         #slideshow > #special > h1{
            line-height:500px;
            color: #fff;
         }
    </style>
</head>
<body>

    <?php
    if ($print_error) {
        echo '
            <div class="jumbotron jumbotron-fluid">
                <div class="container">
                    <h1>No hay rifas disponibles</h1> 
                    <p>Por el momento no tenemos rifas disponibles, <span class="text-danger">Intente en otro momeno, Gracias!</span> </p> 
                </div>
            </div>
        ';
        return false;
    }
    ?>


    <div id="cortinas">   
        <audio id="audio" src="sounds/008882536_prev.mp3" autostart="false" ></audio>
        <audio id="winner" src="sounds/aplausos.mp3" autostart="false" ></audio>
        <audio id="pages" src="sounds/pasando_paginas.mp3" autostart="false" ></audio>
        <img src="img/cortina.jpg" width="100%" id="curtain1">
        <img src="uploads/<?php echo $logo; ?>" id="contains_logo">
        <img src="img/cortina.jpg" width="100%" id="curtain2">

        <a href="#RaffleModal" class="btn btn-outline-primary btn-lg" id="btn_enter_center" role="button" data-toggle="modal">Entrar</a>

    </div>
    
    <div class="modal" id="RaffleModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Rifa <?php echo $name; ?></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-4" id="result">
                    <div class="row">
                        <div class="col">
                               <section id="iphone8plus" class="silver">
                                <!-- <div class="wrap"> -->
                                    <div class="marvel-device iphone-x silver">
										<div class="notch">
											<div class="camera"></div>
											<div class="speaker"></div>
										</div>
                                        <div class="top-bar"></div>
                                        <div class="sleep"></div>
                                        <div class="volume"></div>
                                        <div class="sensor"></div>
                                        <div class="screen">
                                            <div id="slideshow">

                                                <?php
                                                $sqlDetails = "SELECT id, content FROM raffle_details WHERE raffle_id = '{$id}';";
                                                $res = $db->query($sqlDetails);
                                                while ($details = $res->fetch_assoc()) {
                                                    echo "<div><img src=uploads/{$details['content']}></div>";
                                                }
                                                ?>
                                                <span id="special">
                                                    <h1 id="container_timer">00:00</h1>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="home"></div>
                                        <div class="bottom-bar"></div>
                                    <!-- </div> -->
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal" id="WinnerModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-full" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Ganador!! </h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body p-4" id="result">
                    <div class="row">
                        <div class="col">
                            <img id="WinnerImage">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>



    <script src="vendor/jquery/jquery.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.js"></script>
    <script>
        let seconds = 3;
        let timer, interval;

        //PLAY AUDIO IN
        const PlaySoundIn = () => {
            let audio = document.getElementById("audio");
            audio.pause();
            audio.currentTime=0;
            audio.play();
        }

        const PlaySoundWinner = () => {
            let winner = document.getElementById("winner");
            winner.pause();
            winner.currentTime=0;
            winner.play();
        }

        const PlaySoundPages = () => {
            let pages = document.getElementById("pages");
            pages.pause();
            pages.currentTime=0;
            pages.play();
        }

        const StopSoundPages = () => {
            let pages = document.getElementById("pages");
            pages.pause();
            pages.currentTime=0;
        }

        $( ()=> {

            $('#special').on('click', function(){
                $('#RaffleModal').modal('toggle');
                WinnerModal();
            });

            $("#curtain1").animate({width:10},4000);
            $("#curtain2").animate({width:10},4000);
            $("#contains_logo").fadeOut(2000);
            PlaySoundIn();
        } );

        //WHERE CLOSE MODAL TRIGGER EVENT
        $('#RaffleModal').on('show.bs.modal', function() {
            //HACER CODIGO PARA QUE CUANDO SE VUELVA A DAR LOS VALORES ESTEN RESETEADOS
            $("#special").css('background-color', '#007bff');
            $("#container_timer").text("00:00");
            timer = setInterval("RunTimer()",1000);
            seconds = 3;
        });

        const RunTimer = () => {
            $("#container_timer").text("00:0"+seconds); // this is the same as $("div_timer").html(timer) in       jquery.

            if(seconds < 0) {
                $("#special").css('background-color', 'rgba(255, 255, 255, .0)');
                $("#container_timer").text("X");
                clearInterval(timer);
                clearInterval(interval);
                PlayRaffle();
                PlaySoundPages();
            }

            seconds--;
        }

        const PlayRaffle = (stop) => {
            $("#slideshow > div:gt(0)").hide();
            
            interval = setInterval(function() {
                $('#slideshow > div:first')
                    .hide().next().show().end().appendTo('#slideshow');
                }, 100);
        }

        //LOAD A WINER MODAL
        const WinnerModal = () => {

            $.ajax({
                url: 'classes/get_winner.php',
                data: null,
                type: 'POST',     
                success: function(res){
                    if(res){
                        $("#WinnerImage").attr('src','uploads/'+res);
                        StopSoundPages();
                        PlaySoundWinner();
                        $('#WinnerModal').modal('show');
                    }
                }
            });

        }

    </script>
</body>
</html>