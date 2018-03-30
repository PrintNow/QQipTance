# ~~QQ IP探测~~（已经失效）

## 2018-03-30
<<<<<<< HEAD
> 很抱歉的告诉大家，`QQ IP探测` 已经和谐了。
> 是这样的，我开发时，是在本地测试的，本地测试可用，然后匆忙 push 了 v2.0初始版本（没有数据查询功能），当时我以为可用。
> 就在刚刚，我部署到服务器上运行，然后 `debug` 发现，分享的图片链接会通过 `腾讯` 的服务器进行压缩，然后压缩后返回 `腾讯` 自己的链接，下面是我抓包得到的数据

```
Request Headers:
GET /qqconnectopen/openapi/change_image_url?url=https%3A%2F%2Fip.nowtool.cn%2Fnew_iptance%2Fshare.php%3Ftoken%3D04a9ebdcff4dd4fc9fa1ef53482d0faf%26image_url%3DaHR0cDovL2ltZzEuZ3RpbWcuY29tL2ZpbmFuY2UvcGljcy9odjEvMTY3LzIzLzE5NjkvMTI4MDQwMjU3LmpwZw%3D%3D%26share_user_ip%3D117.178.136.246%26share_time%3D1522417538%26share_type%3Dmobile&userhttps=0&uin=1361289290 HTTP/1.1
User-Agent: android_24_mido_7.0_6.5.5
Host: cgi.connect.qq.com
Connection: Keep-Alive
Accept-Encoding: gzip

Response Headers:
HTTP/1.1 200 OK
Date: Fri, 30 Mar 2018 13:53:40 GMT
Content-Type: text/html;charset=UTF-8
Transfer-Encoding: chunked
Connection: keep-alive
Server: tws
Access-Control-Allow-Headers: Origin, X-Requested-With
Access-Control-Allow-origin: https://openmobile.qq.com
Access-Control-Allow-Methods: GET, POST
Access-Control-Allow-Credentials: true
Content-Encoding: gzip
Vary: Accept-Encoding
=======
> QQ IP探测 V2.0 编写中...
>
>> 18点14分
>>
>> V2.0 Beta 首次提交，数据查询功能正在写ing...
>>
>> 稍安勿躁，别下载
>>>>>>> 2d0ccb981c8df8ba32532756d7218fc957ffd093

Result:
{"retcode":0,"url":"http:\/\/qqadapt.qpic.cn\/qqshare\/0\/d0065417e418add0586a19cc9e19ceaf\/0"}
```

> GET /qqconnectopen/openapi/change_image_url?url=`https%3A%2F%2Fip.nowtool.cn%2Fnew_iptance%2Fshare.php%3Ftoken%3D04a9ebdcff4dd4fc9fa1ef53482d0faf%26image_url%3DaHR0cDovL2ltZzEuZ3RpbWcuY29tL2ZpbmFuY2UvcGljcy9odjEvMTY3LzIzLzE5NjkvMTI4MDQwMjU3LmpwZw%3D%3D%26share_user_ip%3D117.178.136.246%26share_time%3D1522417538%26share_type%3Dmobile&userhttps=0&uin=1361289290` HTTP/1.1
>
> 我标注的那一块就是探测 IP 的图片链接，探测流程大概是：发送探测卡片，用户收到卡片消息，加载预览图片链接（用户主动访问的），然后服务端获取用户的 IP、UA 等信息，然后使用 `302` 跳转，跳转到指定的图片链接
>
> ![image](https://i.loli.net/2018/03/30/5abe464ca2639.png)


## 功能（已失效）
~~探测某个或某些QQ用户的IP~~ 已经失效

## ~~Plan list~~（已失效）
- [x] ~~使用 [MDUI](https://github.com/zdhxiong/mdui) 构建网页~~
- [x] ~~支持可在 PC 和 Android、iOS 系统的手机 浏览器使用~~
- [ ] ~~添加 IP 地址本地查询，使用 [纯真 IP 数据库](http://www.cz88.net)~~
- [x] ~~更多功能，请提交 Issues~~

## 执照
QQipTance 根据 GNU 通用公共许可证v3 ([GPL-3](http://www.gnu.org/copyleft/gpl.html)) 进行许可。
