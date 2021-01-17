<?php
  require "../connections/connectDB.php";

  $target_dir = "files/";
  $target_file = basename($_FILES["fileToUpload"]["name"]);
  $target_path = $target_dir .$target_file;

  $bulletintitle = $_POST['bulletin_title'];
  $bulletindescription = $_POST['bulletin_description'];
  $bulletinrevision = $_POST['bulletin_revision'];
  $bulletindate = $_POST['bulletin_date'];
  $effective = $_POST['bulletin_effective'];
  $bulletinsupercede = $_POST['bulletin_supercede'];
  $bulletintype = $_POST['bulletin_type'];
  $bulletinapplicability = $_POST['bulletin_applicability'];
  $bulletinstatus = $_POST['bulletin_status'];
  $serials = $_POST['serial_id'];

  function insertBulletin($serialids, $bulletinapplicability, $bulletintitle, $bulletindescription, $filename, $bulletinrevision, $bulletindate, $effective, $bulletinsupercede, $bulletintype, $bulletinstatus, $connection){
    $conn = $connection;

    $title = $bulletintitle;
    $description = $bulletindescription;
    $file = $filename;
    $serial = $serialid;
    $revision = $bulletinrevision;
    $date = $bulletindate;
    $supercede = $bulletinsupercede;
    $type = $bulletintype;
    $text = $bulletinapplicability;
    $status = $bulletinstatus;
    $serials = $serialids;


    checkDuplicate($file, $conn);

    $sql = "INSERT INTO
    bulletins
    (bulletin_title,
    bulletin_description,
    bulletin_file_name,
    bu