$(document).ready(function() {
    $(document).on( 'click', 'a.destroy', function(e) {
        e.preventDefault();
        var destroy = $(this).attr('id');
        $.ajax({
            url: $(this).attr('href'),
            success: function(str) {
                $('#' + destroy).parent().remove();
                alert(str);
            },
        });
    });
    $("#file").bind("paste", function(e){
        var pastedData = e.originalEvent.clipboardData.getData('text');
        $.ajax({
            url: '/add',
            type: 'post',
            data: 'url=' + pastedData,
            dataType: 'json',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8',
            },
            success: function(json) {
                if(json['error']){
                    alert(json['error']);
                }else{
                    var item = '<div class="box">';
                    item += '<a class="download" href="' + json['path'] + '" download>' +  json['url'].split('/').pop() + ' </a>';
                    item += '<a id="destroy' + json['id'] + '" class="destroy" href="/destroy/' + json['id'] + ' "> remove</a>';
                    item += '</div>';
                    $('.files').append(item);
                    alert("Complete \r\n path " + json['path'] + "\r\n mime type" + json['mime_type']);
                }
            },
            error: function(xhr) {
                alert(xhr.responseJSON['errors']['url'][0]);
            }
        });

    });
});