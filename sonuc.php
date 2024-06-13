<?php

    if($_FILES["dosya"]["error"] == 4){
        echo "Lütfen bir dosya seçiniz...";
    } else{
        if(is_uploaded_file($_FILES["dosya"]["tmp_name"])){

            $gecerli_dosya_uzantilari = [
                "image/jpeg",
                "image/png",
                "image/gif",
            ];

            $gecerli_dosya_boyutu = (1024 * 1024 * 3);

            $dosya_uzantisi = $_FILES["dosya"]["type"];

            if(in_array($dosya_uzantisi, $gecerli_dosya_uzantilari)){

                if($gecerli_dosya_boyutu >= $_FILES["dosya"]["size"]){

                    $yukle = move_uploaded_file($_FILES["dosya"]["tmp_name"], "upload/" . $_FILES["dosya"]["name"]);
                    
                    if($yukle){
                        echo "Dosyanız başarıyla yüklendi ! '<hr>'";
                        echo '<img src="upload/' . $_FILES["dosya"]["name"] . '">';
                    } else{
                        echo "Bir sorun oluştu";
                    }

                } else{
                    echo "Dosya boyutu maximum 3MB olabilir...";
                }

            } else{
                echo "Dosya sadece png, jpeg ya da gif formatında olabilir";
            }

        } else{
            echo "Dosya yüklenirken bir sorun oluştu...";
        }
    } 

?>