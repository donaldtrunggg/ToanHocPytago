var tinyMCEJS = {
    init: function () {
        tinymce.init({
            height: 700,
            selector: ".tinymce-text",
            setup: function (editor) {
                editor.on('change', function () {
                    editor.save();
                });
            },
            theme: 'modern',
            plugins: 'print preview fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists textcolor wordcount imagetools contextmenu colorpicker textpattern help',
            toolbar1: 'formatselect | bold italic strikethrough forecolor backcolor | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat',
            image_advtab: true
        });
    }
};

$(function () {
    tinyMCEJS.init();
});