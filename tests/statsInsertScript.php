<?php




    $check_date = 1420737393; // '2015-01-08';
    $end_date = 1452273393; // '2016-01-08';
      $db = new PDO('mysql:host=rapid.vm;dbname=wordpress;charset=utf8', 'homestead', 'secret');
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

    while($check_date != $end_date){
        $check_date += 86400;
		$con_date =date("Y-m-d H:i:s", $check_date);  

        $con = mt_rand(5, 15);
        for($i=0; $i<=$con; $i++){
        	try {
        		$chance = mt_rand(0, 1);
        		echo $chance . '<br />';
        		$qry = "Insert into wp_rad_rapidology_stats (record_date, record_type, optin_id, list_id, ip_address, page_id, removed_flag) values ('".$con_date."', 'imp', 'optin_4', 'hubspot-standard_bd6acff2-48ef-411d-ac99-e317212a7ae3', '192.168.10.1', '1', '0')";
			    if($chance > 0){
			    	$qry2 = "Insert into wp_rad_rapidology_stats (record_date, record_type, optin_id, list_id, ip_address, page_id, removed_flag) values ('".$con_date."', 'con', 'optin_4', 'hubspot-standard_bd6acff2-48ef-411d-ac99-e317212a7ae3', '192.168.10.1', '1', '0')";
					$db->query($qry2);
				}
			    //echo $qry;
			    //connect as appropriate as above
			    $db->query($qry); 
			     
			} catch(PDOException $ex) {
			    echo "An Error occured!"; //user friendly message
			    print_r($ex->getMessage());
			}
		}

          
    }
