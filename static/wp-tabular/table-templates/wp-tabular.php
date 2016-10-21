  <?php   
    $data = get_post_meta($pid, 'pricing_table_opt',true);
    $featured=  get_post_meta($pid, 'pricing_table_opt_feature',true); 
    $feature_name=  get_post_meta($pid, 'pricing_table_opt_feature_name',true);
    $package_name=  get_post_meta($pid, 'pricing_table_opt_package_name',true); 
    
    $kc = 0; 
    
?>

<link rel="stylesheet" type="text/css" href="<?php echo plugins_url(); ?>/wp-tabular/css/exts/<?php echo $template;?>.css"> 

<div style="clear: both;"></div>

<table id="pricetable" class="<?php echo $template;?>" border="0" width="100%" cellspacing="0" cellpadding="0" >
        
    
      <input type="hidden" id="featured" name="featured" value="<?php echo $featured;?>">   
      <?php  
    $pkeys=@array_keys($package_name);
    //print_r($package_name); 
    $cnt=count($pkeys);   
    if($cnt > 0 ){
        $imgc=0;
        
    /*foreach($package_name as $index=> $value){ 
        $imgc++;
        //if($featured==$value)$fimg="featured.png";else $fimg="unfeatured.png";
        //echo  $fimg;
        
        $package_key=str_replace(" ","",$value);
        echo  '<td class="'.$index.'"><span id="sp'.$index.'">
        '.$value.'
        </span> 
        
        
        
      
      </td>';
    }*/
    }
?>
      
     <?php
   $fkeys=@array_keys($feature_name);
    $cnt=count($data[$pkeys[0]]);
    
    if( is_array($fkeys) ){ 
        $counter=0;
        
    foreach($feature_name as $index1=> $value1){
        if($counter%2==0)$class="";else $class="odd"; 
        $feature_key = str_replace(" ","",$value1);
        echo "<tr class='{$class}'>";
        $t=0;
        foreach($package_name as $index=> $value){
            $package_key=str_replace(" ","",$value);
            $t++;
            
            echo  '<td class="'.$index.' '.$index1.'">'
            .$data[$index][$index1].'</td>';
        }
        echo "</tr>";
        $counter++;  
    }
    }
?>
   
</table>

