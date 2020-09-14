$(function(){
    $('.login-btn').on('click', function(e){
        $('.login-form').trigger('reset');
    });

    $('.mobile-toggle').click(function(e)
    {
        $(this).toggleClass('active');
        $('.pure-menu-fixed').toggleClass('active');
        $('.mobile-menu').toggleClass('active');
        $('body').toggleClass('active');
    });

    $(".password-login").on('keypress', function(e){
        if(e.keyCode == 13)
        {
            $('.login-form').submit();
        }
    });

    $(".email-login").on('keypress', function(e){
        if(e.keyCode == 13)
        {
            $('.login-form').submit();
        }
    });

    $('.login-form').validate({
        rules: {
            email: {
                required: true,
                email: true
            },
            password: {
                required: true
            }
        },
        highlight: function (element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            return false;
        }
    });

    $('#city').on('change', function(e){
        e.preventDefault();
        var store = $('#store');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });
        
        $.ajax({
            url: $(this).attr('action'),
            method: "GET",
            dataType: "json",
            data: {
                city: $(this).val()
            },
            beforeSend: function() {
                store.find('option').remove();
                store.append('<option selected="true" disabled>Nama Toko</option>');
            },
            success: function(result)
            {
                store.focus();
                $.each(result.data, function(i, dt){
                    store.append(new Option(dt.name.toUpperCase(), dt.name.toUpperCase()));
                });
            }
        });

        return false;
    });

    $('.login-form').on('submit', function(e){
        e.preventDefault();
        
        var rawdata = $(this).serializeArray();
        var data = {};
        $.each(rawdata, function(i, field) 
        {            
            data[field.name] = field.value;
        });

        // console.log(data);

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="token"]').attr('content')
            }
        });

        var to = $(this).attr('to');
        
        $.ajax({
            url: $(this).attr('action'),
            method: $(this).attr('method'),
            dataType: "json",
            data: {
                email: data.email,
                password: data.password,
            },
            beforeSend: function() {
                toastr.info('Please wait authentication in progress ...');
            },
            success: function(result)
            {
                // alert(result.status);
                if(result.status == 200)
                {
                    swal({
                        icon: 'success',
                        title: 'Login Berhasil !',
                        text: 'Silahkan Tunggu Beberapa Saat.',
                        button: false,
                        timer: 3000
                    }).then(() => {
                        // alert(to);
                        window.location.href = to;
                    });
                }
                else
                {
                    swal({
                        icon: 'error',
                        title: 'Login Failed !',
                        text: 'Email atau Password salah !.',
                        button: false,
                        timer: 3000
                    }).then(() => {
                        $('.login-form').trigger('reset');        
                    });
                }
                // console.log(result);
                // toastr.clear();
                // if(result.status == 200)
                // {
                //     toastr.success(result.data, result.message);
                // }
                // else
                // {
                //     toastr.error(result.data, result.message);
                // }
            }
        });

        return false;
    });

    $('.login-submit').on('click', function(){
        $('.login-form').submit();
    });

    var notif = null;

    $('.submit-claim').on('click', function(){
        notif = false;
        $('.form-claim').submit();
    });

    $('.form-claim').validate({
        rules: {
            city: {
                required: true
            },
            store: {
                required: true
            },
            product: {
                required: true
            },
            fullname: {
                required: true
            },
            phone: {
                required: true
            },
            sn: {
                required: true
            },
            foto: {
                required: true
            }
        },
        highlight: function (element) {
            if(notif == false)
            {
                swal("Error !", "Please fill the required data !", "error");
                notif = true;
            }
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function (element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function (error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },
        submitHandler: function (form) {
            return false;
        }
    });
});