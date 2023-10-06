<?php
include "nav.php"
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Rijschool vierkantewielen</title>
</head>
<body>  
<form action="" method="POST">
<center><p style="font-size:30px;">
    Pakketten</p>
    <br>
    <div id="accordion">

<div class="card">
    <div class="card-header">
    <a class="btn" data-bs-toggle="collapse" href="#collapseOne">
    Pakket 1
</a>
    </div>
    <div id="collapseOne" class="collapse show" data-bs-parent="#accordion">
    <div class="card-body">
        €13,99 11 weken lessen (€1,27 / week inclusief btw).
</div>
</div>

<div class="card">
    <div class="card-header">
    <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo">
        Pakket 2
</a>
    </div>
    <div id="collapseTwo" class="collapse" data-bs-parent="#accordion">
    <div class="card-body">
        €24,99 22 weken lessen (€2,27 / week inclusief btw).
</div>
</div>

<div class="card">
<div class="card-header">
<a class="collapsed btn" data-bs-toggle="collapse" href="#collapseThree">
    Pakket 3
</a>
</div>
<div id="collapseThree" class="collapse" data-bs-parent="#accordion">
<div class="card-body">
        €51,99 voltijd lessen inclusief examen (€0,99 / week inclusief btw).
</div>
</div>

<div class="card">
<div class="card-header">
<a class="collapsed btn" data-bs-toggle="collapse" href="#collapseFour">
    Pakket 4
</a>
</div>
<div id="collapseFour" class="collapse" data-bs-parent="#accordion">
<div class="card-body">
        €31,99 voor alleen examen (geldige ID)
</div>
</div>

</body>
</html>