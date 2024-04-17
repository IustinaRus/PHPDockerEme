<?php
require_once 'connection1.php';

$sql1 = "DROP TRIGGER IF EXISTS BeforeUpdateTrigger";
$sql2 = "CREATE TRIGGER BeforeUpdateTrigger BEFORE UPDATE ON dogs FOR EACH ROW
BEGIN
    SET NEW.details = LOWER(NEW.details);
    SET NEW.price = LOWER(NEW.price);
END";

$stmt1 = $con->prepare($sql1);
$stmt2 = $con->prepare($sql2);
$stmt1->execute();
$stmt2->execute();

$sql3 = "DROP TRIGGER IF EXISTS AfterUpdateTrigger";
$sql4 = "CREATE TRIGGER AfterUpdateTrigger AFTER UPDATE ON dogs FOR EACH ROW
BEGIN
    INSERT INTO dog_update(image, details, price, edtime) VALUES (NEW.details, 'UPDATED', NEW.price, NOW());
END";

$stmt3 = $con->prepare($sql3);
$stmt4 = $con->prepare($sql4);
$stmt3->execute();
$stmt4->execute();
?>
