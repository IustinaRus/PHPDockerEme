<?php

require_once 'connection1.php';
$sql1 = "DROP TRIGGER IF EXISTS BeforeInsertTrigger";
$sql2 = "CREATE TRIGGER BeforeInsertTrigger BEFORE INSERT ON dogs FOR EACH ROW
BEGIN 
SET NEW.price=UPPER(NEW.price);
END";

$stmt1 = $con->prepare($sql1);
$stmt2 = $con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();

$sql3 = "DROP TRIGGER IF EXISTS AfterInsertTrigger";
$sql4 = "CREATE TRIGGER AfterInsertTrigger AFTER INSERT ON dogs FOR EACH ROW
BEGIN 
    INSERT INTO dog_update(image, details, price, edtime) VALUES (NEW.image, 'INSERTED', NEW.price, NOW());
END";


$stmt3 = $con->prepare($sql3);
$stmt4 = $con->prepare($sql4);
$stmt3->execute();
$stmt4->execute();