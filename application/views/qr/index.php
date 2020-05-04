
<html>

<head>
    <meta name="description" content="QR Code scanner" />
    <meta name="keywords" content="qrcode,qr code,scanner,barcode,javascript" />
    <meta name="language" content="English" />
    <meta name="copyright" content="Lazar Laszlo (c) 2011" />
    <meta name="Revisit-After" content="1 Days" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Web QR</title>

    <style type="text/css">
        body {
            width: 100%;
            text-align: center;
        }
        
        img {
            border: 0;
        }
        
        #main {
            margin: 15px auto;
            background: white;
            overflow: auto;
            width: 100%;
        }
        
        #header {
            background: white;
            margin-bottom: 15px;
        }
        
        #mainbody {
            background: white;
            width: 100%;
            display: none;
        }
        
        #footer {
            background: white;
        }
        
        #v {
            width: 320px;
            height: 240px;
        }
        
        #qr-canvas {
            display: none;
        }
        
        #qrfile {
            width: 320px;
            height: 240px;
        }
        
        #mp1 {
            text-align: center;
            font-size: 35px;
        }
        
        #imghelp {
            position: relative;
            left: 0px;
            top: -160px;
            z-index: 100;
            font: 18px arial, sans-serif;
            background: #f0f0f0;
            margin-left: 35px;
            margin-right: 35px;
            padding-top: 10px;
            padding-bottom: 10px;
            border-radius: 20px;
        }
        
        .selector {
            margin: 0;
            padding: 0;
            cursor: pointer;
            margin-bottom: -5px;
        }
        
        #outdiv {
            width: 320px;
            height: 240px;
            border: solid;
            border-width: 3px 3px 3px 3px;
        }
        
        #result {
            border: solid;
            border-width: 1px 1px 1px 1px;
            padding: 20px;
            width: 70%;
        }
        
        ul {
            margin-bottom: 0;
            margin-right: 40px;
        }
        
        li {
            display: inline;
            padding-right: 0.5em;
            padding-left: 0.5em;
            font-weight: bold;
          /* //  border-right: 1px solid #333333; */
        }
        
        li a {
            text-decoration: none;
            color: black;
        }
        
        #footer a {
            color: black;
        }
        
        .tsel {
            padding: 0;
        }
    </style>

    <script type="text/javascript" src="<?=base_url()?>assets/QRscannerPage/llqrcode.js"></script>
    <script type="text/javascript" src="../apis.google.com/js/plusone.js"></script>
    <!-- <script type="text/javascript" src="<?=base_url()?>assets/QRscannerPage/webqr.js"></script> -->
    <script type="text/javascript" src="<?=base_url()?>assets/QRscannerPage/jquery-1.11.2.min.js"></script>

    <script type="text/javascript">
        var _gaq = _gaq || [];
        _gaq.push(['_setAccount', 'UA-24451557-1']);
        _gaq.push(['_trackPageview']);

        (function() {
            var ga = document.createElement('script');
            ga.type = 'text/javascript';
            ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(ga, s);
        })();
    </script>

<script>
    // QRCODE reader Copyright 2011 Lazar Laszlo
    // http://www.webqr.com

    var gCtx = null;
    var gCanvas = null;
    var c = 0;
    var stype = 0;
    var gUM = false;
    var webkit = false;
    var moz = false;
    var v = null;

    var imghtml = '<div id="qrfile"><canvas id="out-canvas" width="320" height="240"></canvas>' +
        '<div id="imghelp">drag and drop a QRCode here' +
        '<br>or select a file' +
        '<input type="file" onchange="handleFiles(this.files)"/>' +
        '</div>' +
        '</div>';

    var vidhtml = '<video id="v" autoplay></video>';

    function dragenter(e) {
        e.stopPropagation();
        e.preventDefault();
    }

    function dragover(e) {
        e.stopPropagation();
        e.preventDefault();
    }

    function drop(e) {
        e.stopPropagation();
        e.preventDefault();

        var dt = e.dataTransfer;
        var files = dt.files;
        if (files.length > 0) {
            handleFiles(files);
        } else
        if (dt.getData('URL')) {
            qrcode.decode(dt.getData('URL'));
        }
    }

    function handleFiles(f) {
        var o = [];

        for (var i = 0; i < f.length; i++) {
            var reader = new FileReader();
            reader.onload = (function(theFile) {
                return function(e) {
                    gCtx.clearRect(0, 0, gCanvas.width, gCanvas.height);

                    qrcode.decode(e.target.result);
                };
            })(f[i]);
            reader.readAsDataURL(f[i]);
        }
    }

    function initCanvas(w, h) {
        gCanvas = document.getElementById("qr-canvas");
        gCanvas.style.width = w + "px";
        gCanvas.style.height = h + "px";
        gCanvas.width = w;
        gCanvas.height = h;
        gCtx = gCanvas.getContext("2d");
        gCtx.clearRect(0, 0, w, h);
    }


    function captureToCanvas() {
        if (stype != 1)
            return;
        if (gUM) {
            try {
                gCtx.drawImage(v, 0, 0);
                try {
                    qrcode.decode();
                } catch (e) {
                    console.log(e);
                    setTimeout(captureToCanvas, 500);
                };
            } catch (e) {
                console.log(e);
                setTimeout(captureToCanvas, 500);
            };
        }
    }

    function htmlEntities(str) {
        return String(str).replace(/&/g, '&amp;').replace(/</g, '&lt;').replace(/>/g, '&gt;').replace(/"/g, '&quot;');
    }


    function read(a) {
        var html = "<br>";
        if (a.indexOf("http://") === 0 || a.indexOf("https://") === 0)
            html += "<a target='_blank' href='" + a + "'>" + a + "</a><br>";
        html += "<b>" + htmlEntities(a) + "</b><br><br>";
        document.getElementById("result").innerHTML = html;

        //var dataString = {send: true, credential: htmlEntities(a)};
        $.ajax({
            type: "POST",
            url: "<?=base_url('QRcontroller/authenticateScannedQR')?>",
            data: { send: true, credential: htmlEntities(a) },
            dataType: "json",
            cache: false,
            success: function(data) {
                if (data.success == true) {
                    alert("You have successfully logged in!");
                    self.location.replace("<?=base_url('QRcontroller/index') ?>");
                } else {
                    alert("The credentials not match!");
                    self.location.replace("<?=base_url('QRcontroller/index') ?>");
                }
                setwebcam();
            },
            error: function(xhr, status, error) {
                alert(error);
            },
        });
    }

    function isCanvasSupported() {
        var elem = document.createElement('canvas');
        return !!(elem.getContext && elem.getContext('2d'));
    }

    function success(stream) {

        v.srcObject = stream;
        v.play();

        gUM = true;
        setTimeout(captureToCanvas, 500);
    }

    function error(error) {
        gUM = false;
        return;
    }

    function load() {
        if (isCanvasSupported() && window.File && window.FileReader) {
            initCanvas(800, 600);
            qrcode.callback = read;
            document.getElementById("mainbody").style.display = "inline";
            setwebcam();
        } else {
            document.getElementById("mainbody").style.display = "inline";
            document.getElementById("mainbody").innerHTML = '<p id="mp1">QR code scanner for HTML5 capable browsers</p><br>' +
                '<br><p id="mp2">sorry your browser is not supported</p><br><br>' +
                '<p id="mp1">try <a href="http://www.mozilla.com/firefox"><img src="firefox.png"/></a> or <a href="http://chrome.google.com"><img src="chrome_logo.gif"/></a> or <a href="http://www.opera.com"><img src="Opera-logo.png"/></a></p>';
        }
    }

    function setwebcam() {

        var options = true;
        if (navigator.mediaDevices && navigator.mediaDevices.enumerateDevices) {
            try {
                navigator.mediaDevices.enumerateDevices()
                    .then(function(devices) {
                        devices.forEach(function(device) {
                            if (device.kind === 'videoinput') {
                                if (device.label.toLowerCase().search("back") > -1)
                                    options = { 'deviceId': { 'exact': device.deviceId }, 'facingMode': 'environment' };
                            }
                            console.log(device.kind + ": " + device.label + " id = " + device.deviceId);
                        });
                        setwebcam2(options);
                    });
            } catch (e) {
                console.log(e);
            }
        } else {
            console.log("no navigator.mediaDevices.enumerateDevices");
            setwebcam2(options);
        }

    }

    function setwebcam2(options) {
        console.log(options);
        document.getElementById("result").innerHTML = "- scanning -";
        if (stype == 1) {
            setTimeout(captureToCanvas, 500);
            return;
        }
        var n = navigator;
        document.getElementById("outdiv").innerHTML = vidhtml;
        v = document.getElementById("v");


        if (n.mediaDevices.getUserMedia) {
            n.mediaDevices.getUserMedia({ video: options, audio: false }).
            then(function(stream) {
                success(stream);
            }).catch(function(error) {
                error(error)
            });
        } else
        if (n.getUserMedia) {
            webkit = true;
            n.getUserMedia({ video: options, audio: false }, success, error);
        } else
        if (n.webkitGetUserMedia) {
            webkit = true;
            n.webkitGetUserMedia({ video: options, audio: false }, success, error);
        }

        document.getElementById("qrimg").style.opacity = 0.2;
        document.getElementById("webcamimg").style.opacity = 1.0;

        stype = 1;
        setTimeout(captureToCanvas, 500);
    }

    function setimg() {
        document.getElementById("result").innerHTML = "";
        if (stype == 2)
            return;
        document.getElementById("outdiv").innerHTML = imghtml;
        //document.getElementById("qrimg").src="qrimg.png";
        //document.getElementById("webcamimg").src="webcam2.png";
        document.getElementById("qrimg").style.opacity = 1.0;
        document.getElementById("webcamimg").style.opacity = 0.2;
        var qrfile = document.getElementById("qrfile");
        qrfile.addEventListener("dragenter", dragenter, false);
        qrfile.addEventListener("dragover", dragover, false);
        qrfile.addEventListener("drop", drop, false);
        stype = 2;
    }
</script>
</head>

<body>
    <div id="main">
        <div id="header">
            <div style="position:relative;top:+20px;left:0px;">
                <g:plusone size="medium"></g:plusone>
            </div>
            <p id="mp1">
                QR Code scanner
            </p>
            <ul>
                <li><a href="<?=base_url('QRcontroller/index')?>">Scan</a></li>
                <!-- <li><a href="create.php">Create</a></li> -->
            </ul>
        </div>
        <div id="mainbody">
            <table class="tsel" border="0" width="100%">
                <tr>
                    <td valign="top" align="center" width="50%">
                        <table class="tsel" border="0">
                            <tr>
                                <td><img class="selector" id="webcamimg" src="<?=base_url()?>assets/QRscannerPage/vid.png" onclick="setwebcam()" align="left" /></td>
                                <td><img class="selector" id="qrimg" src="<?=base_url()?>assets/QRscannerPage/cam.png" onclick="setimg()" align="right" /></td>
                            </tr>
                            <tr>
                                <td colspan="2" align="center">
                                    <div id="outdiv">
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <img src="<?=base_url()?>assets/QRscannerPage/down.png" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <div id="result"></div>
                    </td>
                </tr>
            </table>
            <script async src="../pagead2.googlesyndication.com/pagead/js/f.txt"></script>
            <!-- webqr_2016 -->
            <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8418802408648518" data-ad-slot="2527990541" data-ad-format="auto"></ins>
            <script>
                (adsbygoogle = window.adsbygoogle || []).push({});
            </script>
        </div>&nbsp;

    </div>
    <canvas id="qr-canvas" width="800" height="600"></canvas>
    <script type="text/javascript">
        load();
    </script>
</body>
</html>