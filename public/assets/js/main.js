$(function () {
    try {
        $('[data-toggle="tooltip"]').tooltip();
        $('[data-toggle="tooltip-r"]').tooltip({ placement: 'right' });
        $('[data-toggle="tooltip-l"]').tooltip({ placement: 'left' });
        $('[data-toggle="tooltip-t"]').tooltip({ placement: 'top' });
        $('[data-toggle="tooltip-b"]').tooltip({ placement: 'bottom' });
    } catch (err) { console.log(err.message) }

    try {
        $('.form-control.datetime').inputmask('d/m/y h:s', { placeholder: '__/__/____ __:__', alias: "datetime", hourFormat: '24' });
        $('.form-control.date').inputmask('dd/mm/yyyy', { placeholder: '__/__/____' });
        $('.form-control.mssv').inputmask('99.999.999', { placeholder: '__.___.___' });
        $('.form-control.email').inputmask({ alias: "email" });
        $('.form-control.phone').inputmask('9999 9999 [999]', { placeholder: '___ ____ ____' });
        $('.form-control.number').inputmask({ alias: "integer", rightAlign: false });
    } catch (err) { console.log(err.message) }
    try { activateNotificationAndTasksScroll(); } catch (err) { console.log(err.message) }

    $('.dataTable').DataTable({
        responsive: true,
        stateSave: true,
        processing: true,
        "language":
        {
            "decimal": "",
            "emptyTable": "Dữ liệu rỗng",
            "info": "Hiển thị từ _START_ đến _END_ trong tổng cộng _TOTAL_ dòng",
            "infoEmpty": "Dữ liệu rỗng",
            "infoFiltered": "(tìm kiếm từ _MAX_ dòng)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": 'Hiển thị _MENU_ dòng',
            "loadingRecords": "Đang tải...",
            "processing": "Đang xử lý...",
            "search": '<label class="control-label">Tìm kiếm</label>',
            "zeroRecords": "Không tìm thấy",
            "paginate": {
                "first": "Đầu",
                "last": "Cuối",
                "next": "»",
                "previous": "«"
            },
            "aria": {
                "sortAscending": ": activate to sort column ascending",
                "sortDescending": ": activate to sort column descending"
            }
        },
        "aoColumnDefs": [{
            "bSortable": false,
            "aTargets": ["no-sort"]
        }]
    });

    $(window).resize(function () {
        try { setSkinListHeightAndScroll(); } catch (err) { console.log(err.message) }
        try { setSettingListHeightAndScroll(); } catch (err) { console.log(err.message) }
    });
});

var animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

//Activate notification and task dropdown on top right menu
function activateNotificationAndTasksScroll() {
    $('.navbar-right .dropdown-menu .body .menu').slimscroll({
        height: '254px',
        color: 'rgba(0,0,0,0.5)',
        size: '4px',
        alwaysVisible: false,
        borderRadius: '0',
        railBorderRadius: '0'
    });
}