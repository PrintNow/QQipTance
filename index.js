var siteUrl = "http://127.0.0.1/";//改成你的域名
var myApp = new Framework7({
	modalTitle: 'QQIP探测',
	material: true,
	swipePanel: 'left',
});
var clipboard = new Clipboard('#copy');
clipboard.on('success', function(e) {
	myApp.addNotification({
		message: '复制成功',
		hold: 1500
	});
	e.clearSelection()
});
var $$ = Dom7;
var mainView = myApp.addView('.view-main', {});
$$(document).on('ajaxStart', function(e) {
	myApp.showIndicator()
});
$$(document).on('ajaxComplete', function(e) {
	myApp.hideIndicator()
});
$$('#token').on("focusout", function(e) {
	var ts = new Date().getTime().toString();
	$$('#get-submit').attr('href', './data.php?token=' + $$('#token').val() + '&_ts=' + ts)
});
$$('.panel-left').on('open', function() {
	$$('.statusbar-overlay').addClass('with-panel-left')
});
$$('.panel-left').on('close', function() {
	$$('.statusbar-overlay').removeClass('with-panel-left')
});
$$('#collect-submit').on('click', function(e) {
	if ($$("#url").val() == "") {
		myApp.addNotification({
			message: '请填写跳转链接。',
			hold: 1500
		});
		return
	}
  console.log($$("#shareid").val());
	if ($$("#shareid").val() == "") {
		myApp.addNotification({
			message: '警告：你没填Shareid！',
			hold: 1500
		});
		return
	}
	var ts = new Date().getTime().toString();
	var token = CryptoJS.MD5(ts);
	var url = "mqqapi://share/to_fri?file_type=news&src_type=web&version=1&generalpastboard=1";
	url = url + "&file_type=news&share_id=";
	url = url + $$("#shareid").val();
	url = url + "&url=";
	url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse($$("#url").val())));
	url = url + "&image_url=";
	url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(siteUrl+"share.php?_U=" + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse($$("#cover").val()))) + "&_T=" + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(token))))));
	url = url + "&title=";
	url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse($$("#title").val())));
	url = url + "&description=";
	url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse($$("#summary").val())));
	if ($$("#music").val() != "") {
		url = url + "&req_type=";
		url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(2)));
		url = url + "&audioUrl=";
		url = url + encodeURIComponent(CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse($$("#music").val())))
	}
	url = url + "&callback_type=scheme&thirdAppDisplayName=UVE=&app_name=UVE=&cflag=0&shareType=0";
  console.log(url);
	window.open(url);
	myApp.alert('你的token是：<br/><a id="copy" data-clipboard-text="' + token + '">' + token + '</a><br/>你可以用这个Token来取回数据。')
});

function ipip(ip) {
	myApp.showIndicator();
	$.ajax({
		url: "./ip.php?ip=" + ip,
		success: function(data) {
			myApp.alert(data, '归属地');
			myApp.hideIndicator()
		}
	})
}
myApp.addNotification({
	message: '欢迎使用，使用方法请 点击左上角 -> 食用方法',
	hold: 10000
});