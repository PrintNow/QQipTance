<!DOCTYPE html>
<html lang="zh-CN">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta name="renderer" content="webkit">
		<meta name="theme-color" content="#607d8b" />
		<title>现在工具网</title>
		<link rel="stylesheet" href="./css/bootstrap.min.css">
		<link href="./css/mdui.min.css" rel="stylesheet">
	</head>
	<body class="mdui-theme-accent-blue mdui-theme-primary-blue">

		<div class="mdui-container">

			<div class="mdui-panel" mdui-panel>
				<div class="mdui-panel-item mdui-panel-item-open">
					<div class="mdui-panel-item-header">音乐搜索器</div>
					<div class="mdui-panel-item-body">
						搜索格式建议为：歌曲名 歌手名。如我想搜房东的猫唱的柔软就搜 <code>柔软 房东的猫</code>
					</div>
				</div>
			</div>

			<div class="mdui-panel" mdui-panel>
				<div class="mdui-panel-item mdui-panel-item-open">
					<div class="mdui-container">
						音乐源：
						<select is="source_select" class="mdui-select" mdui-select>
							<option value="netease">[荐] 网易云音乐</option>
							<option value="qq">QQ 音乐</option>
							<option value="kugou">酷狗音乐</option>
							<option value="kuwo">酷我音乐</option>
							<option value="xiami">虾米音乐</option>
							<option value="baidu">百度音乐</option>
							<option value="1ting">一听音乐</option>
							<option value="migu">咪咕音乐</option>
							<option value="lizhi">荔枝音乐</option>
							<option value="qingting">蜻蜓音乐</option>
							<option value="ximalaya">喜马拉雅 FM</option>
							<option value="kg">全民K歌</option>
							<option value="6666" disabled>你就是点不着</option>
						</select>

						<div class="mdui-textfield">
							<label class="mdui-textfield-label">音乐名：</label>
							<input id="music_name" class="mdui-textfield-input" type="text" placeholder="例如: 柔软 房东的猫"/>
						</div>

						<div class="mdui-progress mdui-hidden">
							<div class="mdui-progress-indeterminate"></div>
						</div><br/>

						<div class="mdui-col">
							<input id="search_music" class="mdui-btn mdui-btn-block mdui-color-theme-accent mdui-btn-raised" onclick="search_music()" type="button" value="搜索"></button>
					</div><br/>

					<button id="open_dialog" class="mdui-btn mdui-color-theme-accent mdui-ripple mdui-hidden" mdui-dialog="{target: '#example-3'}">open</button>

					<div class="mdui-dialog" id="example-3">
						<div class="mdui-dialog-title">搜索结果</div>
						<div class="mdui-dialog-content" id="search_music_result">

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <div class="input-group">
											<span class="input-group-addon" aria-hidden="true">音乐链接</span>
                      <input type="url" class="form-control" id="music_link" value="http://music.163.com/#/song?id=294726" placeholder="音乐链接" disabled>
											<div class="input-group-btn">
												<button id="copy-text" class="btn btn-default music_link" data-clipboard-text="" mdui-tooltip="{content: '点击复制音乐链接', position: 'top'}"><span class="glyphicon glyphicon-copy"></span></button>
						            <a id="href_music_link" href="http://music.163.com/#/song?id=294726" target="_blank" class="btn btn-default"  mdui-tooltip="{content: '打开音乐链接', position: 'top'}"><span class="glyphicon glyphicon-share"></span></a>
											</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-6">
									<div class="form-group">
                    <div class="input-group">
											<span class="input-group-addon" aria-hidden="true">音乐直链</span>
                      <input type="url" class="form-control" id="music_straight_link" value="音乐直链" placeholder="音乐直链" disabled>
											<div class="input-group-btn">
												<button id="copy-text" class="btn btn-default music_straight_link" data-clipboard-text="音乐直链" mdui-tooltip="{content: '点击复制音乐直链', position: 'top'}">
													<span class="glyphicon glyphicon-copy"></span>
												</button>
						            <a id="href_music_straight_link" href="http://music.163.com/" target="_blank" class="btn btn-default" mdui-tooltip="{content: '点击下载音乐', position: 'top'}" download="test.mp3"><span class="glyphicon glyphicon-download-alt"></span></a>
											</div>
                    </div>
                  </div>
                </div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" aria-hidden="true">音乐 ID</span>
											<input type="num" class="form-control" id="music_id" value="294726" placeholder="音乐 ID" disabled>
											<div class="input-group-btn">
												<button id="copy-text" class="btn btn-default music_id" data-clipboard-text="294726" mdui-tooltip="{content: '点击复制音乐 ID', position: 'top'}">
													<span class="glyphicon glyphicon-copy"></span>
												</button>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" aria-hidden="true">音乐歌词</span>
											<input type="text" class="form-control" id="music_lrc" value="音乐歌词" placeholder="音乐歌词" disabled>
											<!-- <div class="input-group-btn">
												<a href="http://music.163.com/song/media/outer/url?id=294726.mp3" target="_blank" class="btn btn-default"><span class="glyphicon glyphicon-download-alt" mdui-tooltip="{content: '点击下载歌词', position: 'top'}"></span></a>
											</div> -->
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" aria-hidden="true">歌曲名</span>
											<input type="text" class="form-control" id="music_title" value="北京欢迎你" placeholder="音乐名字" disabled>
										</div>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon" aria-hidden="true">歌手</span>
											<input type="text" class="form-control" id="music_singer" value="谭晶,谭智元" placeholder="歌手" disabled>
										</div>
									</div>
								</div>
              </div>



						</div>
						<div class="mdui-dialog-actions">
							<button class="mdui-btn mdui-ripple" mdui-dialog-close>关闭</button>
							<!-- <button class="mdui-btn mdui-ripple" mdui-dialog-confirm>turn on speeboost</button> -->
						</div>
					</div>

				</div>
			</div>
		</div>



	</body>
	<!-- <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
	<script src="./js/clipboard.min.js"></script>
	<script src="./js/mdui.min.js"></script>
	<!-- <script src="https://cdn.bootcss.com/jquery/1.11.1/jquery.min.js"></script> -->
	<script src="./js/script.js"></script>
</html>
