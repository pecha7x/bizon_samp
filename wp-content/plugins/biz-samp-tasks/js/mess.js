var mess = {
    init : function(){
        $(".modalbox").fancybox();
        $('tbody tr[data-href]').addClass('clickable');
	$("#contact").submit(function() { return false; });
        this.mess_send();
        this.mess_click();
        this.action();
    },

    mess_click : function(){
        var tmp = new Array();  
        var tmp2 = new Array();     
        var param = new Array();
        var get = location.search;  
        if(get != '') {
            tmp = (get.substr(1)).split('&');   
            for(var i=0; i < tmp.length; i++) {
                tmp2 = tmp[i].split('=');       
                param[tmp2[0]] = tmp2[1];      
            }
            switch (param['page']) {
                case 'outcoming':
                    $('.mess').parent().removeClass('active');
                    $('#'+param['page']).parent().addClass('active');
                    break
                case 'important':
                    $('.mess').parent().removeClass('active');
                    $('#'+param['page']).parent().addClass('active');
                    break
                case 'archive':
                    $('.mess').parent().removeClass('active');
                    $('#'+param['page']).parent().addClass('active');
                    break
                case 'incoming':
                    $('.mess').parent().removeClass('active');
                    $('#'+param['page']).parent().addClass('active');
                    break
            }
         }   
    },
                                
    action : function(){ 
        $('tbody tr[data-href]').mousedown(function(){
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/site1/wp-content/plugins/biz-samp-tasks/messages.php',
                data: {'id': $(this).attr('data-href')},
                success: function(data){
                    $('#inline2').html(data);
                }
            });
        if(location.search.length < 12){
            $(this).removeClass('info');
        }
        $(this).fancybox();
        });
    },

    mess_send : function(){
        $("#send").on("click", function(){
			var themeval  = $("#theme").val();
			var msgval    = $("#msg").val();
                        var addrval  = $("#addressee").val();
			var msglen    = themeval.length;
                        var themelen    = msgval.length;
                        var addrlen    = addrval.length;
			
			if(msglen < 1) {
				$("#msg").addClass("error");
			}
			else if(msglen >= 1){
				$("#msg").removeClass("error");
			}
                        
                        if(themelen < 1) {
				$("#theme").addClass("error");
			}
			else if(themelen >= 1){
				$("#theme").removeClass("error");
			}
                        if(addrlen < 0) {
				$("#addrval").addClass("error");
			}
			else if(addrlen >= 1){
				$("#addrval").removeClass("error");
			}
			
			if(msglen >= 1 && themelen >= 1 && addrlen >= 1) {
				$("#send").replaceWith('<em id="sending">отправка...</em>');
				
				$.ajax({
					type: 'POST',
					url: '/site1/wp-content/plugins/biz-samp-tasks/sendmessage.php',
					data: $("#contact").serialize(),
					success: function(data) {

							$("#contact").fadeOut("fast", function(){
								$(this).before("<p><strong>Success! You message sent</strong></p>");
								setTimeout("$.fancybox.close()", 1000);                                              
                                                                setTimeout("location.reload()", 1600);
                                                                document.forms.contact.reset();
                                                                //setTimeout('$("#contact").fadeIn().prev().remove()', 1600);
                                                                //setTimeout('$("#sending").replaceWith(\'<button id="send">Send</button>\')', 1600);
							});     
					}
				});
			}
		});
    }
};


$(document).ready(function() {
   mess.init();
 });