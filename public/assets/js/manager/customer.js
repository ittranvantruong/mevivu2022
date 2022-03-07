$(document).on('submit', 'form#formCheckInfoCustomer', function (e) {
    e.preventDefault();
    // if(!$(this).parsley().isValid()){
    //     return;
    // }
    
    var that = $(this), modal = that.data('modal');
    startAjax(that);
    $.ajax({
        url: that.attr('action'),
        type: 'GET',
        data: that.serialize(),
    }).done(function(data) {
        if(data.status == 1){
            $(modal+' form input[name="api_id"]').val(data.data.id);
            $(modal+' form input[name="fullname"]').val(data.data.name);
            $(modal+' form input[name="email"]').val(data.data.email);
            $(modal+' form input[name="phone"]').val('0'+data.data.sdt);
            $(modal+' form input[name="address"]').val(data.data.address);
            $(modal).modal("show");
        }else{
            $.toast({
                heading: 'Thất bại',
                text: data.message,
                position: 'top-right',
                icon: 'error', 
                hideAfter: 10000
            });
        }
        that.parsley().reset();
      })
      .fail(function(data) {
        $.map(data.responseJSON, function(value) {
            value.forEach(element => {
                $.toast({
                    heading: 'Thất bại',
                    text: element,
                    position: 'top-right',
                    icon: 'error', 
                    hideAfter: 10000
                });
            });
        });
      })
    .always(function() {
        endAjax(that, 'Kiểm tra');
      });
});