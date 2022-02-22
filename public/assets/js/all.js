
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
