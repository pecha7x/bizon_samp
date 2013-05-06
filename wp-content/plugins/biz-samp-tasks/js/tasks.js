var task = {
    init : function(){
        this.action();
        $('.btn').fancybox();
        $('#dp3').datepicker();
        $('#dp4').datepicker();
        //this.done_exec_task();
    },

    action : function(){
        $('.action').click(function(e){
            e.preventDefault();
            $('.action_new').parent().removeClass('active');
            $('.action').parent().removeClass('active');
            $(this).parent().addClass('active');
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/site1/wp-content/plugins/biz-samp-tasks/view_task.php',
                data: {'id': $(this).data('id')},
                success: function(data){
                    $('.results').html(data);
                }
            });
        });
    },
    
    done_exec_task : function(){
        $('.btn btn-primary btn-mini').click(function(e){
            e.preventDefault();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '/site1/wp-content/plugins/biz-samp-tasks/oper_of_task.php',
                data: {'id': $(this).data('id')},
                success: function(data){
                    $('.inline3').html(data);
                }
            });
        });
    }
};


$(document).ready(function() {
   task.init();
 });