<?php
    $data = get_post_meta($post->ID, 'quick_notice_opt',true);
?>
    <script language="JavaScript">
    <!--
      jQuery(function(){
          
          jQuery('.curtime').removeClass('misc-pub-section-last');
          jQuery('#misc-publishing-actions').append('<div class="expire misc-pub-section misc-pub-section-last">Expire on <b id="expr"><?php echo $data['expire']?date("M d, Y @ H:i",$data['expire']):'Never'; $data['expire'] = $data['expire']?$data['expire']:strtotime("+1 year"); ?></b> <a tabindex="6" id="edtex" class="edit-timestamp hide-if-no-js" href="#edit_exprdt">Edit</a><div class="hide-if-js" id="exprdt" style="display: none;"><div class="timestamp-wrap"><select tabindex="4" id="exm">\
            <option value="00">Jan</option>\
            <option value="01" <?php echo date("m",$data['expire'])=='02'?'selected=selected':''; ?> >Feb</option>\
            <option value="02" <?php echo date("m",$data['expire'])=='03'?'selected=selected':''; ?> >Mar</option>\
            <option value="03" <?php echo date("m",$data['expire'])=='04'?'selected=selected':''; ?> >Apr</option>\
            <option value="04" <?php echo date("m",$data['expire'])=='05'?'selected=selected':''; ?> >May</option>\
            <option value="05" <?php echo date("m",$data['expire'])=='06'?'selected=selected':''; ?> >Jun</option>\
            <option value="06" <?php echo date("m",$data['expire'])=='07'?'selected=selected':''; ?> >Jul</option>\
            <option value="07" <?php echo date("m",$data['expire'])=='08'?'selected=selected':''; ?> >Aug</option>\
            <option value="08" <?php echo date("m",$data['expire'])=='09'?'selected=selected':''; ?> >Sep</option>\
            <option value="09" <?php echo date("m",$data['expire'])=='10'?'selected=selected':''; ?> >Oct</option>\
            <option value="10" <?php echo date("m",$data['expire'])=='11'?'selected=selected':''; ?> >Nov</option>\
            <option value="11" <?php echo date("m",$data['expire'])=='12'?'selected=selected':''; ?> >Dec</option>\
</select><input type="text" autocomplete="off" tabindex="4" maxlength="2" size="2" value="<?php echo $data['expire']?date("d",$data['expire']):''; ?>" id="exd">, <input type="text" autocomplete="off" tabindex="4" maxlength="4" size="4" value="<?php echo $data['expire']?date("Y",$data['expire']):''; ?>" id="exy"> @ <input type="text" autocomplete="off" tabindex="4" maxlength="2" size="2" value="<?php echo $data['expire']?date("h",$data['expire']):''; ?>" id="exh"> : <input type="text" autocomplete="off" tabindex="4" maxlength="2" size="2" value="<?php echo $data['expire']?date("i",$data['expire']):''; ?>"  id="exi"></div>\
<p>\
<a class="save-timestamp hide-if-no-js button" id="exok" href="#edit_timestamp">OK</a>&nbsp;\
<a class="cancel-timestamp hide-if-no-js" id="excncl" href="#edit_timestamp">Cancel</a>\
</p>\
</div><input type="hidden" name="pricing_table[expire]" value="<?php echo $data['expire']; ?>" id="exprv" /></div>');
          
      
      
      jQuery('#edtex').live('click',function(){
        jQuery('#exprdt').slideDown();
        jQuery('#edtex').fadeOut();
        return false;    
      });
      jQuery('#excncl').live('click',function(){
        jQuery('#exprdt').slideUp();
        jQuery('#edtex').fadeIn();
        return false;    
      });
      
      jQuery('#exok').live('click',function(){  
        var y = jQuery('#exy').val();  
        var m = jQuery('#exm').val();  
        var d = jQuery('#exd').val();  
        var h = jQuery('#exh').val();  
        var i = jQuery('#exi').val();  
        jQuery('#expr').html(jQuery('#exm option:selected').text()+" "+d+", "+y+" @ "+h+":"+i);
        jQuery('#exprv').val(new Date(Date.UTC(y,m,d,h,i,0)).getTime()/1000);
       
        jQuery('#exprdt').slideUp();
        jQuery('#edtex').fadeIn();
        return false;    
      });
      jQuery('#edit-slug-box').remove();
      jQuery('.row-actions .view').remove();
      jQuery('#title-prompt-text').html('Write your message here');
 });      
    //-->
    </script>
    <style type="text/css">
    #quick-notice-options select{
        min-width: 85px;
    }
    #quick-notice-options label{
        font-size:8pt;
    }
    </style>