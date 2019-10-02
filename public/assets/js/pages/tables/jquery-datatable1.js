$(function () {
    $('.js-basic-example').DataTable({
        responsive: true
    });

    //Exportable table
    $('.js-exportable').DataTable({
        dom: 'Bfrtip',
        responsive: true,
        buttons: [
            'excel', 'pdf', 'print'
        ],
        language: {
            decimal:        "",
            emptyTable:     "Không có dữ liệu trong bảng",
            info:           "Từ <b>_START_</b> đến <b>_END_</b> trên <b>_TOTAL_</b> bản ghi",
            infoEmpty:      "Không có bản ghi nào",
            infoFiltered:   "(filtered from _MAX_ total entries)",
            infoPostFix:    "",
            thousands:      ",",
            lengthMenu:     "Chỉ hiện _MENU_ bản ghi",
            loadingRecords: "Đang tải dữ liệu...",
            processing:     "Chương trình đang chạy...",
            search:         "Tìm kiếm:",
            zeroRecords:    "Không tìm thấy dữ liệu",
            paginate: {
                first:      "Đầu",
                last:       "Cuối",
                next:       "Tiếp theo",
                previous:   "Trước đó"
            },
            aria: {
                sortAscending:  ": activate to sort column ascending",
                sortDescending: ": activate to sort column descending"
            }
        }
    });
});