$$.ajax({
    method: 'POST',
    url: 'http://music.local.host/',
    data: {
        input: music_name,
        filter: 'name',
        type: source,
        page: '1'
    },
    dataType: 'json',
    success: function (data) {

    }
});