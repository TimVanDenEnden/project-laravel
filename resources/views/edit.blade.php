<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Tasks | Project made by T1mdevelopment</title>

    <!-- Load bootstrap 4.1.1 -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Load custom css file -->
    <link rel="stylesheet" type="text/css" href="../css/custom.css">

    <!-- Load material icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

</head>
<body>

<?php 

    if ($validation === false)
    {

?>

<div class="container-fluid" style="padding-bottom: 70px;">
   <div class="row">
        <div class='col-sm-12 col-md-6 col-lg-6'>
            <div class="card card-no-hover">
                <h3 class='padding-h3'>Edit Task</h3>
                <form action="/edit" method="post"> 
                    <input type="text" class="input-field" placeholder="Title.." name="title" value="<?= $card[0]['title'] ?>">
    
                    <!-- Token need to execute  -->
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                    <textarea rows="4" class="input-field" placeholder="Description.." name="description"><?= $card[0]['description'] ?></textarea>

                    <input type="hidden" name="id" value="<?= $card[0]['id'] ?>" />

                    <button type="submit" class="btn">Save Task</button> 
                </form> 
            </div>
        </div>
    </div>
</div>

<?php 

    }

    if ($validation === true)
    {

?>

<div class="container-fluid" style="padding-bottom: 70px;">
   <div class="row">
        <div class='col-sm-12 col-md-6 col-lg-6'>
            <div class="card card-no-hover">
                <h3 class='padding-h3'>Edit Task</h3>
                <p class="errorMessageForm"><?= $message ?></p>
                <form action="/edit" method="post"> 
                    <input type="text" class="input-field" placeholder="Title.." name="title" value="<?= $_POST['title'] ?>">
    
                    <!-- Token need to execute  -->
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                    <textarea rows="4" class="input-field" placeholder="Description.." name="description"><?= $_POST['description'] ?></textarea>

                    <input type="hidden" name="id" value="<?= $_POST['id'] ?>" />

                    <button type="submit" class="btn">Save Task</button> 
                </form> 
            </div>
        </div>
    </div>
</div>

<?php 

    }
?>

<nav class="navbar task-nav navbar-toggleable-md navbar-inverse fixed-bottom bg-inverse" style="background: #263238;">
    <!-- <span class="icon-task-nav-left" href="#"><i class="material-icons icon-task-nav">person</i></span> -->
    <a class="" href="/"><i class="material-icons icon-task-nav">dashboard</i></a>

    <!-- <a class="add-task" href="#">Add Task</a> -->

    <!-- <a class="" href="#"><i class="material-icons icon-task-nav" style="text-align: right;">input</i></a> -->
</nav>

<!-- Load boostrap 4.1.1 scripts -->
<script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>


</body>
</html>

