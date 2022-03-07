
function customDatatable(element = '#tableDatatable', options = []) {
    $(element).DataTable({
        columnDefs: [
            { orderable: false, targets: options }
        ],
        "language": {
            "emptyTable": "Không có dữ liệu nào !",
            "info": "Hiển thị _START_ đến _END_ trong số _TOTAL_ mục nhập",
            "infoEmpty": "Hiển thị 0 đến 0 trong số 0 mục nhập",
            "infoFiltered": "(Có _TOTAL_ kết quả được tìm thấy)",
            "lengthMenu": "Hiển thị _MENU_ bản ghi",
            "search": "Tìm kiếm",
            "zeroRecords": "Không có bản ghi nào tìm thấy !",
            "paginate": {
                "first": "First",
                "last": "Last",
                "next": '<i class="fa fa-angle-double-right" aria-hidden="true"></i>',
                "previous": '<i class="fa fa-angle-double-left" aria-hidden="true"></i>'
            }
        }
    });
}
function startAjax(element){
    element = element.find('button[type="submit"]');
    element.attr('disabled', 'disabled');
    element.html('<span class="spinner-grow spinner-grow-sm"></span> Đang xử lý..');
}

function endAjax(element, text){

    element = element.find('button[type="submit"]');
    element.removeAttr('disabled');
    element.html(text);
    
    // $('.select2-selection__rendered').empty();
}

$(document).ready(function () {
    $("form").submit(function(){
        // $(this).find("button[type='submit']").attr("disabled", "disabled");
        startAjax($(this));
    });

    $("button.submit-form").click(function(){
        if(!confirm("Bạn có muốn thực hiện?")){
            return;
        }
        $($(this).data('target')).submit();
    });

});
$(document).on('click', '.open-modal', function () {
    $($(this).data('target')).modal("show");
});