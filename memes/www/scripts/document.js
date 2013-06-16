/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */


$(document).ready(function() {
   
    /**
     * Make calls to the Ethna index top see below the carried data
     */
    function ajaxGenerateAndGetMeme() {
        var url = $("#image_search").val();
        console.log(url);
        
        var top = $("#meme_top").val();
        var bottom = $("#meme_bottom").val();
        
        $.ajax({
            type: 'POST',
            url: '',
            data: { 
                'image_search': url,
                'meme_top'         : top,
                'meme_bottom'      : bottom
            },
            success: function(msg){
                console.log(msg['success']);
                $("#meme").attr('src','saved_memes/'+ msg['success']);       
                
            }
        });
    }
   
   
   $("#submitMeme").click(function(){
       ajaxGenerateAndGetMeme();
   });
   
   $('#meme_bottom').keydown(function(e) {
       if (e.keyCode == 13) {
           ajaxGenerateAndGetMeme();
       }
   });
   
});