var deleteButtonJS = {
    handleRemove: function () {
        $(".remove-btn").click(function () {
            var id = $(this).val();
            var deleteUrl = $('#delete-url').val();

            swal({
                title: "Do you want to delete this row ",
                text: "",
                icon: "warning",
                buttons: true,
                dangerMode: true
            }).then(function (willDelete) {
                    if (willDelete) {
                        AjaxCommon.post(deleteUrl, {id: id}, function (result) {

                            if (result.code == 200) {
                                swal("Deleted Successfully", {
                                    icon: "success",
                                    button: false
                                });

                                setTimeout(function () {
                                    window.location.reload();
                                }, 2000);
                            } else {
                                swal(data.message, {
                                    icon: "error"
                                });
                            }
                        });
                    }
                }
            )
            ;
        });
    },

    init: function () {
        this.handleRemove();
    }

};

$(function () {
    deleteButtonJS.init();
});