$(function () {

    var firsttitle = 'Movies/Series Tracker'
    var firstcontent = $("#replace-content").html();

    var load = function (url) {
        $.get(url).done(function (data) {
            $("#replace-content").html(data);
        })
    };

    $(document).on('click', 'a', function (e) {
        e.preventDefault();

        var $this = $(this),
            url = $this.attr("href"),
            title = $this.text();

        history.pushState({
            url: url,
            title: title
        }, title, url);

        document.title = title;

        load("pages/"+url);
    });

    $(window).on('popstate', function (e) {
        var state = e.originalEvent.state;
        if (state !== null) {
            document.title = state.title;
            load("pages/"+state.url);
        }else{
            document.title = firsttitle;
            $("#replace-content").html(firstcontent);
        }
    });
});