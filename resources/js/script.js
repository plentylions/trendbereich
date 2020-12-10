$(function () {
    $("body").on("click", ".cookie-bar-trigger-wrapper a[href='#']", function () {
        $('.cookie-bar > div > .btn-primary').click();
        return false;
    });
});