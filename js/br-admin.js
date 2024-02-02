jQuery(function($){

    $('body').on('click', '.br-upl', function(e){

        e.preventDefault();

        var button = $(this),
        custom_uploader = wp.media({
            title: 'Carregar logo',
            library:{
                type: 'image'
            },
            button:{
                text: 'Usar logo'
            },
            multiple: false
        }).on('select', function(){
            var attachment = custom_uploader.state().get('selection').first().toJSON();
            button.html('<img src="' + attachment.url + '">').next().show().next().val(attachment.id);
        }).open();
    });

    $('body').on('click', '.br-rmv', function(e){
        e.preventDefault();

        var button = $(this);
        button.next().val('');
        button.hide().prev().html('Carregar logo');
        
    });

})