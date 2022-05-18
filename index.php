<?php
            require('pages/dataBaseLayer.php');
            /*header("Content-Type:application/json");
            header("Access-Control-Allow-Origin: *");
            header("Access-Control-Allow-Headers: *");
            header("Access-Control-Allow-Methods: *");*/
            $_metodoClient = $_SERVER['REQUEST_METHOD'];
            $array = array();
            $page = @$_POST['start'] ?? 0;
            $size = @$_POST['length'] ?? 20;
            $total = countRecord();
            $baseurl = "http://localhost:8080/index.php";


            switch($_metodoClient){
                case 'POST':
                    $array['data'] = GET($page*$size, $size);
                    $array['recordsFiltered']=$total;
                    $array['recordsTotal']=$total;
                    echo json_encode($array);
                    break;
                /*case 'POST':
                    $dati=json_decode(file_get_contents('php://input'),true);
                    POST($dati["birth_date"], $dati["first_name"], $dati["last_name"], $dati["gender"]);
                    echo json_encode($dati);
                    break;*/
                case 'PUT':
                    $datiPUT=json_decode(file_get_contents('php://input'),true);
                    PUT($_GET['id'], $datiPUT["birth_date"], $datiPUT["first_name"], $datiPUT["last_name"], $datiPUT["gender"]);
                    echo json_encode($datiPUT);
                    break;
                case 'DELETE':
                    DELETE($_GET['id']);
                    echo json_encode($array);
                    break;
            }

            function href($url, $page, $size){
                $href = $url. "?page=" .$page ."&size=" .$size;
                return $href;
            }

            function links($page, $size, $total, $baseurl){
                $links = array();
                $links['first']['href']=href($baseurl, 0, $size);
                if($page>0){
                    $links['prev']['href']=href($baseurl, ($page-1), $size); 
                }
                if($page<floor($total/$size)){
                    $links['next']['href']=href($baseurl, ($page+1), $size);
                }
                $links['last']['href']=href($baseurl, floor($total/$size), $size);

                return $links;
            }
        ?>
