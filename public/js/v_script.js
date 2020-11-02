$( document ).ready(function() {
    $('select#language').change(function () {
        let lang = $(this).val();
        location.replace('/set-language/' + lang);
    })
});