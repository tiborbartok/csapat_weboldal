<?php


/* Save users */
function saveUsers(string $filename, array $dataArray) {
    $file = fopen($filename, "w");
    
    if (!$file) {
        die("A fájlt nem lehetett megnyitni.");
    }
    
    foreach ($dataArray as $data) {
        fwrite($file, serialize($data) . "\n");
    }
    
    fclose($file);
}

/* Load users */
function loadUsers(string $filename): array {
    $file=fopen($filename, "r");
    $dataArray=[];

    if (!$file) {
        die("A fájlt nem lehetett megnyitni.");
    }

    while (($line = fgets($file)) !== false) {
        $data = unserialize($line);
        $dataArray[] = $data;
    }

    fclose($file);
    return $dataArray;
}

/* Profile pic */
function imageUpload(array &$errors, string $username) {

    if (isset($_FILES["profile-picture"]) && is_uploaded_file($_FILES["profile-picture"]["tmp_name"])) {
        if ($_FILES["profile-picture"]["error"] !== 0) {
            $errors[]="Hiba történt a fájlfeltöltés során!";
        }
        $joKiterjesztes=["png", "jpg"];
        $actkiterjesztes=strtolower(pathinfo($_FILES["profile-picture"]["name"], PATHINFO_EXTENSION));

        if (!in_array($actkiterjesztes, $joKiterjesztes)) {
            $errors[] = "Nem megfelelő kiterjesztés! Engedélyezett formátumok: " .
            implode(", ", $joKiterjesztes) . "!";
        }

        if ($_FILES["profile-picture"]["size"] > 5242880) {
            $errors[] = "A fájl mérete túl nagy!";
        }

        if (count($errors) === 0) {
            $utvonal="multimedia/img/profile_pictures/$username.$actkiterjesztes";
            $flag = move_uploaded_file($_FILES["profile-picture"]["tmp_name"], $utvonal);

            if (!$flag) {
                $errors[]="A profilkép elmentése nem sikerült!";
            }
        }
    }
}