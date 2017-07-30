<div data-page="data" class="page">
    <div class="navbar">
        <div class="navbar-inner">
            <div class="left">
                <a href="index.html" class="back link icon-only">
                    <i class="icon icon-back"></i>
                </a>
            </div>
            <div>QQIP探测</div></div>
    </div>
    <div class="page-content ">
        <div class="list-block media-list">
            <ul>

<?php
$token=isset($_GET['token'])?$_GET['token']:'0';
$user_file=dirname(__FILE__).'/cache/'.$token.'.json';

if($token && file_exists($user_file)){
$user = file_get_contents($user_file);
$user = json_decode($user,true);
$i = 0;
foreach($user['result'] as $value){?>
                <li class="swipeout">
                    <div class="swipeout-content">
                        <a id="copy" class="item-link item-content" data-clipboard-text="<?php echo $user['result'][$i]["ip"];  ?>">
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <div class="item-title"><?php //echo preg_replace("/[^\.]{1,3}$/","***",$user['result'][$i]["ip"]);
                                    echo $user['result'][$i]["ip"];
                                      ?></div>
                                    
                                </div>
                                <div class="item-subtitle">
                                <?php if($user['result'][$i]['android'] == true){ ?>
                                    <div class="chip bg-green" onclick="myApp.alert('<?php echo $user['result'][$i]['android_ua'] ?>', 'User-Agent');">
                                        <div class="chip-label">Android</div>
                                    </div>
                                   <?php 
                                    } 
                                    if($user['result'][$i]['ios'] == true){ ?>
                                    <div class="chip bg-purple" onclick="myApp.alert('<?php echo $user['result'][$i]['ios_ua'] ?>', 'User-Agent');">
                                        <div class="chip-label">iOS</div>
                                    </div>
                                 <?php } 
                                 if($user['result'][$i]['pc'] == true){ ?>
                                    <div class="chip bg-blue">
                                        <div class="chip-label">PC</div>
                                    </div>
                                 <?php } 
                                 if($user['result'][$i]['unknown'] == true){ ?>
                                    <div class="chip" onclick="myApp.alert('<?php echo $user['result'][$i]['unknown_ua'] ?>', 'User-Agent');">
                                        <div class="chip-label">未知</div>
                                    </div>
                                 <?php } ?>
                            </div>
                            </div>
                        </a>
                    </div>
                    <div class="swipeout-actions-right">
                        <a onclick="ipip('<?php echo $user['result'][$i]["ip"]; ?>');" href="javascript:void(0);">查询归属地</a>
                    </div>
                </li>
<?php
    $i++; }}else{ ?>
                    <li class="swipeout">
                    <div class="swipeout-content">
                        <a href="javascript:void(0);" class="item-link item-content">
                            <div class="item-inner">
                                <div class="item-title-row">
                                    <div class="item-title">404 Not Found</div>
                                    
                                </div>
                                <div class="item-subtitle">不存在的</div>
                            </div>
                        </a>
                    </div>
                </li>
<?php } ?>
            </ul>
        </div>
    </div>
</div>
