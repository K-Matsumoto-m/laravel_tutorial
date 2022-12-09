$(function () {
    $('#delete-form').submit(function(){
        if (window.confirm('削除します。\nよろしいですか。')) {
            return true;
        } else {
            return false;
        }
    });
});
