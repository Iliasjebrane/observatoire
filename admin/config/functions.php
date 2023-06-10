<?php

    function connected(){ 
        return true; 
    }

    function getPage($page){
        include 'pages/'.$page.'.php';
    }


    function uppercase($chaine){        
        $chaine= strtoupper($chaine); 
        $chaine=str_replace('é', 'É', $chaine);
        $chaine=str_replace('è', 'È', $chaine);
        $chaine=str_replace('ê', 'Ê', $chaine);
        $chaine=str_replace('à', 'À', $chaine);
        $chaine=str_replace('â', 'Â', $chaine);
        $chaine=str_replace('ô', 'Ô', $chaine); 

        return $chaine;
    }

    function lowercase($chaine){        
        $chaine= strtolower($chaine);
        $chaine= ucfirst($chaine); 
        $chaine=str_replace('É', 'é', $chaine);
        $chaine=str_replace('È', 'è', $chaine);
        $chaine=str_replace('Ê', 'ê', $chaine);
        $chaine=str_replace('À', 'à', $chaine);
        $chaine=str_replace('Â', 'â', $chaine);
        $chaine=str_replace('Ô', 'ô', $chaine); 

        return $chaine;
    }  

?>