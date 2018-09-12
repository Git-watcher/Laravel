//关注按钮的单击事件
$('.like-button').click(function(even){
    //获取节点
    var target = $(even.target);

    //获取当前按钮状态
    var current_like = target.attr('like-value');

    //获取当前用户的id
    var user_id = target.attr('like-user');

    //判断是已关注还是未关注
    if(current_like == 1){

        //发送取消关注的ajax请求
        $.ajax({
            url: '/user/'+user_id+'/unfan',
            method: 'GET',
            dataType: 'json',
            success: function(data){
                if(data.error!=0){
                    alert(data.msg);
                    return;
                }

                //如果成功，则修改为0
                target.attr('like-value',0);
                target.text('Follow');
            }
        });

    }else{

        //发送取消关注的ajax请求
        $.ajax({
            url: '/user/'+user_id+'/fan',
            method: 'GET',
            dataType: 'json',
            success: function(data){
                if(data.error!=0){
                    alert(data.msg);
                    return;
                }

                //如果成功，则修改为1
                target.attr('like-value',1);
                target.text('Unfollow');
            }
        });
    }

});