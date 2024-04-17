<?php
require_once 'connection1.php';

// Verifică dacă trigger-ul există și îl șterge înainte de a crea unul nou
$triggerName = "BeforeDeleteTrigger";
$stmt = $con->prepare("DROP TRIGGER IF EXISTS $triggerName");
$stmt->execute();

// Crează trigger-ul pentru operațiile de ștergere
$sql = "CREATE TRIGGER $triggerName BEFORE DELETE ON dogs FOR EACH ROW
        BEGIN
        INSERT INTO dog_update(image, details, price, edtime) VALUES (OLD.image, 'DELETED', OLD.price, NOW());
        END;";
$stmt = $con->prepare($sql);
$stmt->execute();
?>