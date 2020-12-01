require('./bootstrap');

(function($) {

    //show new product request row
    $(document).on('click touchstart', '.add-request', function(e) {
        e.preventDefault();
        $(this).parent().parent().hide();
        let row = $(this).data('id');
        $('#product-row-'+row).show();
        $('#product-row-'+row+' + div').show();
    });

    //submit request form
    $(document).on('click touchstart', '#submit', function(e) {
        e.preventDefault();

        //clear any previous messages and errors
        $('#message').html('');
        let error = false;

        //make sure required fields are filled
        $('.form-control').each(function() {
            $(this).removeClass('error');
            if($(this).prop('required') && !$(this).val() ) {
                $(this).addClass('error');
                error = true;
            }
        });

        //submit form if no errors
        if(!error) {
            let requestform = document.getElementById('request-form');
            let formdata = new FormData(requestform);
            $.ajax({
                type: "POST",
                url: '/request-pieces',
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: formdata,
                processData: false,  
                contentType: false, 
                success: function(response){
                    if(response) {
                        //clear product rows for new request and display submitted request info.
                        $('.form-control').each(function() {
                            $(this).removeClass('error');
                        });
                        requestform.reset();
                        $('#name').val(response.customer.name);
                        $('#email').val(response.customer.email);
                        $('#phone').val(response.customer.phone);
                        $('.form-group.row').hide();
                        $('.add-request[data-id=2]').parent().parent().show();
                        $('#product-row-1').show();
                        $('#message').html(response.message);
                    }
                },
                error: function(error){
                    $('#message').html(error);
                } 
            });
        }
    });

})(jQuery);