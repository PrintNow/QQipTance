//document.getElementById("open_dialog").click();

$("[class='visible-xs-block pt-10 text-center']").attr("sytle","display: none;");



var $$ = mdui.JQ;
var clipboard = new Clipboard('#copy-text');
clipboard.on('success', function(e) {
  //console.log(e);
  var copy_attributes = $$("#copy-text").val();
  console.log(copy_attributes);
  mdui.snackbar({
    message: '复制成功！'
  });
});
clipboard.on('error', function(e) {
  console.log(e);
  mdui.snackbar({
    message: '复制失败，可能是你的浏览器 OUT 了！！！'
  });
});

function search_music() {
  var source = $$(".mdui-select").val(),
      music_name = $$("#music_name").val();

  if(source) {
    if(music_name){
      $$(".mdui-progress").removeClass("mdui-hidden");//添加禁止操作属性
      $$("#search_music").attr("disabled","");//添加禁止操作属性
      $$("#search_music").val("正在搜索相关音乐，请稍等...");
      // $("button").val("这里写上你要修改的值就行了");

      $$.ajax({
        method: 'POST',
        url: 'https://nowtool.cn/music/',
        data: {
          input: music_name,
          filter: 'name',
          type: source,
          page: '1'
        },
        dataType: 'json',
        success: function (data) {
          // console.log(data);
          // console.log(data.data[0]);
          if(data.code == 200){
            $$(".mdui-progress").addClass("mdui-hidden");//添加禁止操作属性
            data_result = data.data[0];
            //音乐链接
            $$("#music_link").attr("value",data_result.link);
            $$(".music_link").attr("data-clipboard-text",data_result.link);
            $$("#href_music_link").attr("href",data_result.link);

            //音乐直链
            $$("#music_straight_link").attr("value",data_result.url);
            $$(".music_straight_link").attr("data-clipboard-text",data_result.url);
            //alert(data_result.title);
            $$("#href_music_straight_link").attr("download",data_result.title+'.mp3');
            $$("#href_music_straight_link").attr("href",data_result.url);

            //音乐 ID
            $$("#music_id").attr("value",data_result.songid);
            $$(".music_id").attr("data-clipboard-text",data_result.songid);

            //音乐直链
            $$("#music_lrc").attr("value",data_result.lrc);
            //$$(".music_lrc").attr("data-clipboard-text",data_result.lrc);
            //$$("#href_music_link").attr("href",data_result.url);

            //歌曲名
            $$("#music_title").attr("value",data_result.title);

            //歌手
            $$("#music_singer").attr("value",data_result.author);
          }
          //console.log(data);
          //$$('#open_dialog').click();
          document.getElementById("open_dialog").click();
          $$("#search_music").removeAttr("disabled");
          $$("#search_music").val("搜索");
          // $("#txt").attr("value",'11');
          // $$("#search_music_result").html("");
          // search_music_result
        }
      });
    }else{
      mdui.alert("<h3>请输入音乐名！<br/>例如: 柔软 房东的猫</h3>")
    }
  }else{
    mdui.alert("<h3>请选择音乐源！</h3>")
  }

}

window.addEventListener("online", Network_online, false);
window.addEventListener("offline", Network_offline, false);

function Network_online() {
  mdui.snackbar({
    message: '网络已重新连接。'
  });
}

function Network_offline() {
  mdui.snackbar({
    message: '网络连接已经断开，请检查你的网络设置。'
  });
}
