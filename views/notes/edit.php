<?php require_once("../../controllers/login/authorise_admin.php"); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Jonker Sailplanes Portal - Edit Technical Model</title>
  <!--Favicon-->
  <link rel="shortcut icon" href="../../css/img/jonkerfav.ico" type="image/x-icon">
  <link href="../../css/sb-admin.css" rel="stylesheet">
  <link href="../../css/styles.css" rel="stylesheet">
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>
<body id="page-top">
  <?php include  "../../templates/header.php"; ?>
<div id="wrapper">
    <?php include  "../../templates/sidebar.php"; ?>
    <div id="content-wrapper">
      <div class="container-fluid">
        <form action="../../controllers/notes/update.php" method="POST" >
          <div class="col">
            <input type="hidden" class="form-control" id="note_id" name="note_id">
            <div class="form-group row">
              <div class="col-sm-3">
                <dt><label>Number:</label><dt>
              </div>
              <div class="col-sm-3">
                <label id="note_number" name="note_number" placeholder="Note Number"></label>
 