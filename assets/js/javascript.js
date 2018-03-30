var $$ = mdui.JQ;
var site_url = 'http://iptance.local.host/';//改成
var clipboard = new Clipboard('#copy');
clipboard.on('success', function(e) {
	mdui.snackbar({
		message: '复制成功！'
	});
});

$$('#send_qq').on('click', function(e) {
	if ($$("#jump_url").val() == "") {
		mdui.dialog({
			title: '提示',
			content: '你没有填写 <u>跳转链接</u>，本站默认填写了 <u>跳转链接</u>，如果你修改了，请刷新本页面以恢复默认值。',
			buttons: [{
				text: '确认'
			}]
		});
		return false;
	} else if ($$("#image_url").val() == "") {
		mdui.dialog({
			title: '提示',
			content: '你没有填写 <u>图片链接</u>，本站默认填写了 <u>图片链接</u>，如果你修改了，请刷新本页面以恢复默认值。',
			buttons: [{
				text: '确认'
			}]
		});
		return false;
	} else if ($$("#card_title").val() == "") {
		mdui.dialog({
			title: '提示',
			content: '你没有填写 <u>卡片标题</u>，本站默认填写了 <u>卡片标题</u>，如果你修改了，请刷新本页面以恢复默认值。',
			buttons: [{
				text: '确认'
			}]
		});
		return false;
	} else if ($$("#card_summary").val() == "") {
		mdui.dialog({
			title: '提示',
			content: '你没有填写 <u>卡片 摘要</u>，本站默认填写了 <u>卡片 摘要</u>，如果你修改了，请刷新本页面以恢复默认值。',
			buttons: [{
				text: '确认'
			}]
		});
		return false;
	}

	var ts = new Date().getTime().toString();
	var tokens = CryptoJS.MD5(ts);

  if (check_devices_type() == 'phone') {
    var image_url = base64_encode(site_url+"share.php?token="+tokens+"&image_url="+base64_encode($$("#image_url").val())+"&share_user_ip="+client_ip+"&share_time="+share_time+"&share_type=mobile");
  	var tance_api = "mqqapi://share/to_fri?file_type=news&src_type=web&version=1&generalpastboard=1&file_type=news&share_id=1105471055&url=" + base64_encode($$("#jump_url").val()) + "&image_url=" + image_url +"&title=" + base64_encode($$("#card_title").val()) + "&description=" +base64_encode($$("#card_title").val()) +"&callback_type=scheme&thirdAppDisplayName=UVE=&app_name=UVE=&cflag=0&shareType=0";
  } else {
    var image_url = base64_encode(site_url+"share.php?token="+tokens+"&image_url="+base64_encode($$("#image_url").val())+"&share_user_ip="+client_ip+"&share_time="+share_time+"&share_type=mobile");
  	var tance_api = 'http://connect.qq.com/widget/shareqq/index.html?site=&title=' + $$("#card_title").val() + '&summary=' + $$("#card_summary").val() + '&pics='+image_url+'&url=' + $$("#jump_url").val();
    console.log(tance_api);
  }
	console.log(image_url);

	if (check_devices_type() == 'phone') {
		window.open(tance_api);
		mdui.dialog({
			title: '<h3>Token 生成成功！[手机]</h3>',
			content: '<div class="mdui-typo"><b>你的 Token 是：<code id="copy" class="mdui-btn" mdui-tooltip="{content: \'点击复制 Token\', position: \'top\'}" data-clipboard-text="' + tokens + '">'+ tokens +'</code></b></div>',
			buttons: [{
				text: 'Close'
			}]
		});
	} else {
		window.open(tance_api);
		mdui.dialog({
			title: '<h3>Token 生成成功！[电脑]</h3>',
			content: '<div class="mdui-typo"><b>你的 Token 是：<code id="copy" class="mdui-btn" mdui-tooltip="{content: \'点击复制 Token\', position: \'top\'}" data-clipboard-text="' + tokens + '">'+ tokens +'</code></b></div>',
			buttons: [{
				text: 'Close'
			}]
		});
	}
});


function url_encode(str) {
	return encodeURI(str);
}

function url_decode(str) {
	return decodeURI(str);
}

function md5(str) {
	return CryptoJS.MD5(str).toString(CryptoJS.enc.Hex);
}

function sha1(str) {
	return CryptoJS.SHA1(str).toString(CryptoJS.enc.Hex);
}

function sha256(str) {
	return CryptoJS.SHA256(str).toString(CryptoJS.enc.Hex);
}

function aes_encode(str, key) {
	return CryptoJS.AES.encrypt(str, key)
}

function aes_decode(str, key) {
	return CryptoJS.AES.decrypt(str, key)
}

function base64_encode(str) {
	return CryptoJS.enc.Base64.stringify(CryptoJS.enc.Utf8.parse(str));
}

function base64_decode(str) {
	var parsedWordArray = CryptoJS.enc.Base64.parse(str);
	return parsedWordArray.toString(CryptoJS.enc.Utf8);
}

function check_devices_type() {
	var sUserAgent = navigator.userAgent.toLowerCase();
	var bIsIpad = sUserAgent.match(/ipad/i) == "ipad";
	var bIsIphoneOs = sUserAgent.match(/iphone os/i) == "iphone os";
	var bIsMidp = sUserAgent.match(/midp/i) == "midp";
	var bIsUc7 = sUserAgent.match(/rv:1.2.3.4/i) == "rv:1.2.3.4";
	var bIsUc = sUserAgent.match(/ucweb/i) == "ucweb";
	var bIsAndroid = sUserAgent.match(/android/i) == "android";
	var bIsCE = sUserAgent.match(/windows ce/i) == "windows ce";
	var bIsWM = sUserAgent.match(/windows mobile/i) == "windows mobile";
	if (bIsIpad || bIsIphoneOs || bIsMidp || bIsUc7 || bIsUc || bIsAndroid || bIsCE || bIsWM) {
		return 'phone'
	} else {
		return 'pc';
	}
}

function query_ip_location(ip){
	window.open('https://ip.nowtool.cn/ip-'+ip+'.html');
}
function request_ip_query(ip) {
	$.ajax({
		method: 'get',
		url: 'https://ip.nowtool.cn/api.php?do=ipbach&ip='+ip,
		dataType: 'json',
		cache: false,
		success: function (data) {
			console.log(data);
			console.log(data.data);
			console.log(data.data.location);
			mdui.dialog({
				title: 'IP 归属地查询',
				content: data.data.location,
				modal: true,
				buttons: [{text: 'Close'}]
			});
		},
		error: function(){
			$("#loadgif").hide();
			console.log('请求错误\n\n');
		}
	})
}
