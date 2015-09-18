$(document).foundation({
    topbar:{
        back_text: '&laquo; Voltar'
    }
});
$(document).ready(function(){

    // $('.alert-box').hide();
    $('.deactivate').click(function(){
        $('.alert-box').fadeIn();
    });
    $('.close,.nope').click(function(){
        $('.alert-box').fadeOut();
    });

    $('.orbit').slick({
        autoplay: true,
        autoplaySpeed:4000,
        appendArrows:'.orbitNav',
        prevArrow:'<a href="#" title="Anterior" class="prev">Anterior</a>',
        nextArrow:'<a href="#" title="Próximo" class="next">Próximo</a>'
    });
    $('.orbitTxt').slick({
        autoplay: true,
        autoplaySpeed:8000,
        appendArrows:'.orbitNavTxt',
        prevArrow:'',
        nextArrow:'<a href="#" title="Próximo" class="next">Próximo</a>'
    });
    $('.depoimentos .wrapDep').slick({
        autoplay: true,
        vertical:true,
        verticalSwiping:true,
        autoplaySpeed:8000,
        adaptiveHeight: true,
        mobileFirst:true,
        appendArrows:'.depNav',
        prevArrow:'<a href="#" title="Anterior" class="prev">Anterior</a>',
        nextArrow:'<a href="#" title="Próximo" class="next">Próximo</a>'
    });
    $('.returnSlider').slick({
        autoplay: true,
        autoplaySpeed:8000,
        appendArrows:'.returnSliderNav',
        prevArrow:'',
        nextArrow:'<a href="#" title="Próximo" class="next">Próximo</a>'
    });
    $(".telefone").mask("(99) 9999-9999?9");
    $(".cpf").mask("999.999.999-9?9");
    $(".cep").mask("99999-999");
    $('#pag_numero').mask('9999 9999 9999 9999');
    $('#pag_data').mask('99/9999');
    $('#pag_cod').mask('99?9');
    $('#nextPost').on('click',function(e){
        e.preventDefault();
        $.ajax({
            url:'postagem.php',
            success : function(data){
                $('#postagem').fadeOut('fast');
                $('#postagem').html(data);
                $('#postagem').fadeIn('slow');
                $('html,body').animate({scrollTop:$('#postagem').offset().top}, 800);
            }
        });
    });
    $('#btn-cadastrar').click(function(){
        $('#form-cadastro').fadeOut(function(){
            $('#form-login').fadeIn();
        });
    });
    $('.unidadesLista label').click(function(){
        $('.unidadesLista li').removeClass('active');
        $(this).parent().addClass('active');
        $('#cad_unidade').val( $(this).prev().val() );
    });
    $('.ajax-form').each(function(){
        var t = $(this);
        var id = t.attr('id');
        $('#' + id).on('invalid.fndtn.abide', function () {
        }).on('valid.fndtn.abide', function () {
            t.ajaxSubmit({
                type        : 'post',
                dataType    : 'json',
                //clearForm : true,
                //resetForm : true,
                target      : '.form_result',
                beforeSubmit: function(formData, jqForm, options) {
                    t.find('input[type="submit"]').prop('disabled', 'disabled');
                },
                success     : function(data)  {
                    t.find('input[type="submit"]').removeAttr('disabled');
                    if(data.result){
                        t[0].reset();
                        var h = '<div data-alert class="alert-box success radius">'+ data.msg +'<a href="javascript:void(0)" class="close">&times;</a></div>';
                        t.find('.form_result').html(h).fadeIn();
                        $(document).foundation();
                        setTimeout(function(){
                            t.find('.form_result').fadeOut();
                            if(typeof(data.url) != "undefined"){
                                document.location = data.url
                            }
                        }, 4000);
                        return;
                    } else {
                        var h = '<div data-alert class="alert-box alert radius">'+ data.msg +'<a href="javascript:void(0)" class="close">&times;</a></div>';
                        t.find('.form_result').html(h).fadeIn();
                        $(document).foundation();
                        setTimeout(function(){
                            t.find('.form_result').fadeOut();
                        }, 4000);
                    }
                    if(typeof(data.url) != "undefined"){
                        document.location = data.url
                    }
                }
            });
            return false;
        });
    });
    window.fbAsyncInit = function() {
            FB.init({
                  appId: '978297375556288',
                  xfbml      : true,
                  version    : 'v2.4'
                });
            };
    (function(d, s, id){
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) {return;}
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/pt_BR/sdk.js";
     fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    ///Facebook Login
    $('#fb-cad').click(function(){
        fbLogin(false);
    });
    $('#fb-login').click(function(){
        fbLogin(true);
    });
    function fbLogin(login){
        FB.login(function(response) {
            if (response.authResponse) {
                pageInit(response.authResponse.userID, login);
            } else {}
        },{ scope: "public_profile, email" });
    }
    function pageInit(id, login){
        var unidade =  $('input[name="unidade"]:checked').val();
        var imagem;
        FB.api('/me', {fields: 'name, email, gender, birthday, link'}, function(response) {
            FB.api('/me/picture?width=200&height=200', function(r) {
                if(!login){
                    if(response.name != ""){
                        $('#cad_nome').val( response.name ).prop('readonly', 'readonly').removeAttr('required');
                    }
                    if(response.email != ""){
                        $('#cad_email').val( response.email ).prop('readonly', 'readonly').removeAttr('required');
                    }
                    $('#cad_senha, #cad_confsenha').removeAttr('required').parent().parent().hide();
                    //$(document).foundation('abide', 'reflow');
                    $('#cad_email').after('<input type="hidden" name="fb_id" value="' +response.id +'" />');
                }
                imagem = r.data.url;
                $.ajax({
                    'type'  : 'POST',
                    'url'   : 'fb-login.php',
                    'dataType' : 'json',
                    'data'  : {
                        'u'         : response,
                        'imagem'    : imagem,
                        'unidade'   : unidade,
                        'login'     : login
                    },
                    'success': function(data, status, xhr) {
                        if(!data.result){
                            window.location.href = data.url;
                        }
                    },
                    'beforeSend': function(){},
                    'complete' : function(){}
                });
            });
        });
    }
});