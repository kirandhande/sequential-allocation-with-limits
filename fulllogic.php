<?php
	$jsonStr ='{"fp_ids":["5387a47f2f92e2af1a69e217","538789982f92e2af1a178dd5","53877bcc2f92e2af1aeda2c6","53875ec42f92e2af1a951347","53879dc32f92e2af1a5546a2","589328172f92e26f358f2118","5762fe5f2f92e23952103aee","5387743a2f92e2af1ad69b83","53879bd72f92e2af1a4f5062","53876fb82f92e2af1ac8e4cf","5762d0ed2f92e23952a189ca","576325c52f92e2395270b639","53879ca12f92e2af1a51c07f","57631d172f92e239525b79cd","59aec492d73c68b037920538","584045d02f92e2c3378cc33d","538754dd2f92e2af1a764f9d","5387a7d02f92e2af1a740eb4","559a4e61dd838c9db3d22be1","5387a7a92f92e2af1a739ab2","53874bbe2f92e2af1a596314","59087c87d73c68006c8b59c6","5387a0452f92e2af1a5cedad","5387a82f2f92e2af1a752d45","576306ec2f92e2395225447f","5387a47f2f92e2af1a69e217","538789982f92e2af1a178dd5","53877bcc2f92e2af1aeda2c6","53875ec42f92e2af1a951347","53879dc32f92e2af1a5546a2","589328172f92e26f358f2118","5762fe5f2f92e23952103aee","5387743a2f92e2af1ad69b83","53879bd72f92e2af1a4f5062","53876fb82f92e2af1ac8e4cf","5762d0ed2f92e23952a189ca","576325c52f92e2395270b639","53879ca12f92e2af1a51c07f","57631d172f92e239525b79cd","59aec492d73c68b037920538","584045d02f92e2c3378cc33d","538754dd2f92e2af1a764f9d","5387a7d02f92e2af1a740eb4","584045d02f92e2c3378cc33d","538754dd2f92e2af1a764f9d","5387a7d02f92e2af1a740eb4"],"users":[{"user_id":"19079","name":"Visweswaraa Rao","email":"visweswararao1@buzzboard.com","asign_leads":"5"},{"user_id":"19081","name":"Sunil Kumar","email":"sunilksv@buzzboard.com","asign_leads":"5"}],"assignment_option":"manual","total_assigned_leads":10,"total_selected_leads":46,"total_unassigned_leads":36,"partner_id":"152","campaign_name":"OWF_06262019","email_template_key":"owf_first_email_with_url","req_type":"all","kd_test":"1"}' ; 

	$data = json_decode($jsonStr, true); 
	$users = $data['users'] ; 
	$userCoount = count($users) ; 
	$i = 0 ;
    	$j = 0;
	foreach($data['fp_ids'] as $item ){
        if($j == (int)$data['total_assigned_leads']){
            break;
        }
        $j++;
		echo '<hr>' ; 
		$i = isvalid($users, $i, $userCoount); 
		echo "<br>return:"	. $i . '<br>'; 
		$users[$i]['fp_ids'][] = $item ; 
		$i++ ;
		if($i > ($userCoount-1) ){
			$i = 0 ; 
		}
	}

    	function isvalid($users, $index, $userCoount){
		echo "<br> ->".$index  .'->' . count($users[$index]['fp_ids']) .'->'. $users[$index]['asign_leads'] ;
		if( isset($users[$index]['fp_ids']) &&  count($users[$index]['fp_ids']) == (int)$users[$index]['asign_leads']){
			echo '<br>'; 
			$index++ ;
			if($index > ($userCoount-1) ){
				$index = 0 ; 
			}
			return isvalid($users, $index, $userCoount) ; 
		}else{
			echo "<br>before:".$index; ; 
			return $index; 
		}
	}    

	echo '<pre>' ; print_r($users); echo '</pre>' ;
	echo '<pre>' ; print_r($data['fp_ids'] ); echo '</pre>' ;
?>
