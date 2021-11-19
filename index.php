<?php
    //funzione ricorsiva di stampa
    function stampa($arrAss){
        foreach($arrAss as $k=>$v){
            //echo "<p>$k -". gettype($v)."<p>";
            //se il valore è un oggetto allora richiamo la funzione
            if(is_object($v)){
                echo "<p>$k</br>";
                stampa($v);
                echo "</p>";
            }else{
                echo "$k = $v</br>";
            }
        }

    }
    
    echo "
        <h1>Gestione File JSON</h1>
        <p>Partendo da un array lo salviamo su un file json</p>
        <p>Stampiamo a video il file jseon salvato</p>
    ";
    $persone = array(
        'pers1' => array(

            'nome' => 'Laura',
            'cognome' => 'Rossi'
        ),
        'pers2' => array(

            'nome' => 'Krizia',
            'cognome' => 'Bruni'
        )
    );
    //creo in formato json
    $json = json_encode($persone);
    echo "
        <h3>Json Encode</h3>
        <p>$json</p>
    ";
    //salviamo il contenuto sul file
    $fjw = fopen("store/persone.json","w");
    if(fwrite($fjw,$json))
        echo "<p>File json scritto</p>";
    else
        echo "<p>Errore scrittura del file json</p>";
    fclose($fjw);

    //apriamo il file json
    $fjr = fopen("store/persone.json","r");
    $json = fread($fjr,filesize("store/persone.json"));
    //stampo il json
    echo "<p>Cofica json</br>$json<p>";
    //trasformiamo il json nell'array associativo
    $arrAss = json_decode($json);
    stampa($arrAss);
?>