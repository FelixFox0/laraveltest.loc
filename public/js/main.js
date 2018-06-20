$(document).ready(function() {
    $(document).on( 'click', 'a.destroy', function(e) {
        e.preventDefault();
        var destroy = $(this).attr('id');
        $.ajax({
            url: $(this).attr('href'),
            success: function() {
                console.log(destroy)
                $('#' + destroy).parent().remove();
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
//                console.log(json);
                var item = '<div>';
                item += '<a class="download" href="' + json['path'] + '" download>' +  json['url'].split('/').pop() + ' </a>';
                item += '<a id="destroy' + json['id'] + '" class="destroy" href="/destroy/' + json['id'] + ' "> remove</a>';
                item += '</div>';
                $('.files').prepend(item);
            },
        });

    });
});