<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PEWPEW</title>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
    </head>

<body>


    <div class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url()."/pew".""?>">PewPew</a>
            </div>

            <center>
                <div class="navbar-collapse collapse" id="navbar-main">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="<?php echo base_url("pew/registration")?>">Registration</a> <br/>
                        </li>
                    </ul>

                    <form class="navbar-form navbar-right" role="search" action="<?php echo base_url("pew/show") . '?' . $_SERVER['QUERY_STRING'] ?>" method="post">
                        <div class="form-group">
                            <input type="text" class="form-control" name="uname" placeholder="Username">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pname" placeholder="Password">
                        </div>
                        <?php echo validation_errors(); ?>
                        <?php echo $this->session->flashdata('err'); ?> 
                        <button type="submit" value="Submit" class="btn btn-success">Sign In</button>
                    </form>
                </div>
            </center>
        </div>
    </div>

        <div class="container" id="jquery">
            <!-- Main component for a primary marketing message or call to action -->
            <div class="jumbotron"  align="center" >
                <h1>Test jQuery </h1>
                <img id="images" src="https://source.unsplash.com/random/600x400" alt="">
            </div>
        </div> 

        <div class="container" id="ajax">
            <div class="jumbotron"  align="center" >
                <h1>Test Ajax </h1>
                <img id="imagesajax" src="" alt="">
            </div>
        </div>
</body>
<script>
$(document).ready(function(){
    var temp=0;
    $("#jquery").click(function(){

        if( temp == 0){
            $('#images').attr('src', 'https://source.unsplash.com/random/600x401');
        }else if(temp == 1){
            $('#images').attr('src', 'https://source.unsplash.com/random/600x402');
        }else if(temp == 2){
            $('#images').attr('src', 'https://source.unsplash.com/random/600x403');
        }else if(temp == 3){
            $('#images').attr('src', 'https://source.unsplash.com/random/600x404');
        }else if(temp == 4){
            $('#images').attr('src', 'https://source.unsplash.com/random/600x405');
        }else if(temp == 5){
            $('#images').attr('src', 'https://source.unsplash.com/random/600x406');
        }else if(temp == 6){
            $('#images').attr('src', 'https://source.unsplash.com/random/600x407');
        }else if(temp == 7){
            $('#images').attr('src', 'https://source.unsplash.com/random/600x408');
        }else if(temp == 8){
            $('#images').attr('src', 'https://source.unsplash.com/random/600x409');
        }else if(temp == 9){
            $('#images').attr('src', 'https://source.unsplash.com/random/600x410');
            temp =0
        }
        temp+=1;
    });

    $('#ajax').click(function(){
        var url = 'https://media.giphy.com/media/pkYigxymEkV44/giphy.gif';
        $.ajax({ 
            url : url, 
            cache: true,
            processData : false,
        }).always(function(){
            $("#imagesajax").attr("src", url).fadeIn();
        });   
    });
});
</script>
</html>