<!DOCTYPE html>
<html>

    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui" />
        <meta name="mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="theme-color" content="#2196f3" />
        <title>QQIP探测</title>
        <link href="https://cdn.bootcss.com/framework7/1.6.4/css/framework7.material.min.css" rel="stylesheet">
        <link href="https://cdn.bootcss.com/framework7/1.6.4/css/framework7.material.colors.min.css" rel="stylesheet">
        <link href="./Roboto.css" rel="stylesheet">
        <link href="./Material+Icons.css" rel="stylesheet">
        <link rel="stylesheet" href="./index.css" /></head>
        <?php $_GET['statusBarHeight']='0'; /*if(isset($_GET['statusBarHeight'])){*/ ?>
        <style>.statusbar-overlay{height:<?php echo $_GET['statusBarHeight']; ?>px;}.page{border-top:<?php echo $_GET['statusBarHeight']; ?>px solid #2196f3}.panel-left .list-block {margin:<?php echo $_GET['statusBarHeight']+2; ?>px 0;}</style>
        <?php /*}*/ ?>

            <body>
                <div class="statusbar-overlay"></div>
                <div class="panel-overlay"></div>
                <div class="panel panel-left panel-cover">
                    <div class="view">
                        <div class="pages">
                            <div class="page-content page-panel-left">
                                <div class="list-block">
                                    <ul>
                                        <li>
                                            <a href="./usage.html" class="item-link item-content close-panel">
                                                <div class="item-media">
                                                    <i class="material-icons">help_outline</i></div>
                                                <div class="item-inner">
                                                    <div class="item-title">食用方法</div></div>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="./about.html" class="item-link item-content close-panel">
                                                <div class="item-media">
                                                    <i class="material-icons">info_outline</i></div>
                                                <div class="item-inner">
                                                    <div class="item-title">关于</div></div>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="views">
                    <div class="view view-main">
                        <div class="pages navbar-fixed">
                            <div data-page="index" class="page toolbar-fixed">
                                <div class="navbar">
                                    <div class="navbar-inner">
                                        <div class="left">
                                            <a href="#" class="link open-panel icon-only">
                                                <i class="icon icon-bars"></i>
                                            </a>
                                        </div>
                                        <div>QQIP探测</div></div>
                                </div>
                                <div class="toolbar tabbar">
                                    <div class="toolbar-inner">
                                        <a href="#tab-collect" class="active tab-link">收集数据</a>
                                        <a href="#tab-get" class="tab-link">取回数据</a></div>
                                </div>
                                <div class="tabs-animated-wrap">
                                    <div class="tabs">
                                        <div id="tab-collect" class="page-content tab active">
                                            <div class="content-block">
                                                <form id="collect-info-v2" class="list-block inputs-list store-data">
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">跳转链接</div>
                                                            <div class="item-input">
                                                                <input id="url" type="text" value="http://finance.qq.com/original/MissMoney/mm0043.html" name="url" /></div>
                                                          		<input type="hidden" id="shareid" name="shareid" value="1105471055"/>
                                                        </div>
                                                        <div class="item-media" onclick="myApp.addNotification({message: '点击消息后转到的网址，必填，否则发送失败。',hold: 1500});">
                                                            <i class="icon material-icons">help</i></div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">图片链接</div>
                                                            <div class="item-input">
                                                                <input id="cover" type="text" value="http://img1.gtimg.com/finance/pics/hv1/167/23/1969/128040257.jpg" name="cover" /></div>
                                                        </div>
                                                        <div class="item-media" onclick="myApp.addNotification({message: '消息上显示的图片.',hold: 1500});">
                                                            <i class="icon material-icons">help</i></div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">音乐链接</div>
                                                            <div class="item-input">
                                                                <input id="music" type="text" name="music" /></div>
                                                        </div>
                                                        <div class="item-media" onclick="myApp.addNotification({message: '直接在消息上播放音乐，可不填。',hold: 1500});">
                                                            <i class="icon material-icons">help</i></div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">标题</div>
                                                            <div class="item-input">
                                                                <input id="title" type="text" value="中国为什么没有500元以上的大额纸币？" name="title" /></div>
                                                        </div>
                                                        <div class="item-media" onclick="myApp.addNotification({message: '消息上显示的标题。',hold: 1500});">
                                                            <i class="icon material-icons">help</i></div>
                                                    </div>
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">概要</div>
                                                            <div class="item-input">
                                                                <input id="summary" type="text" value="新版100元已于11月12日面世，但500元的大额纸币..." name="summary" /></div>
                                                        </div>
                                                        <div class="item-media" onclick="myApp.addNotification({message: '消息上显示的概要。',hold: 1500});">
                                                            <i class="icon material-icons">help</i></div>
                                                    </div>
                                                    <a id="collect-submit" href="javascript:void(0);" class="button button-raised button-fill color-blue">发送到QQ</a></form>
                                            </div>
                                        </div>
                                        <div id="tab-get" class="page-content tab">
                                            <div class="content-block">
                                                <form class="list-block inputs-list">
                                                    <div class="item-content">
                                                        <div class="item-inner">
                                                            <div class="item-title label">Token</div>
                                                            <div class="item-input">
                                                                <input id="token" type="text" placeholder="" /></div>
                                                        </div>
                                                    </div>
                                                    <a id="get-submit" href="javascript:void(0);" class="button button-raised button-fill color-blue">取回数据</a></form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script type="text/javascript" src="https://cdn.bootcss.com/framework7/1.6.4/js/framework7.min.js"></script>
                <script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
                <script src="https://cdn.bootcss.com/crypto-js/3.1.9/crypto-js.min.js"></script>
                <script src="https://cdn.bootcss.com/clipboard.js/1.7.1/clipboard.min.js"></script>
                <script type="text/javascript" src="./index.js"></script>
            </body>

</html>
