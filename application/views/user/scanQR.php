<html>
<head>
    <meta name="description" content="QR Code scanner" />
    <meta name="keywords" content="qrcode,qr code,scanner,barcode,javascript" />
    <meta name="language" content="English" />
    <meta name="copyright" content="nitrr 2020" />
    <meta name="robots" content="index, follow" />
    <meta http-equiv="Content-type" content="text/html;charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Smart Gate QR Scanner</title>
    <style type="text/css">
        body {
            width: 100%;
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
            margin:10px;
            border-width: 1px 1px 1px 1px;
            padding: 10px;
            width: 30%;
        }
      
      
        .tsel {
            padding: 0;
        }
    </style>

<script type="text/javascript" src="<?=base_url()?>assets/QRscannerPage/llqrcode.js"></script>
<script type="text/javascript" src="https://apis.google.com/js/plusone.js"></script>

<script>
    // QRCODE reader Copyright 2020 nitrr.ac.in
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

        //var dataString = { send: true, credential: htmlEntities(a) };
        $.ajax({
            type: "POST",
            url: "<?=base_url('userController/UserController/authenticateScannedQR'); ?>",
            data: { send: true, credential: htmlEntities(a) },
            dataType: "json",
            cache: false,
            success: function(data) {
                if (data.success == true) {
                    alert("You have successfully logged in!");
                    self.location.replace('<?=base_url('QR-Scanner') ?>');
                } else {
                    alert("The credentials not match!");
                    self.location.replace('index.php');
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

</head>
<?php include 'layout/header.php'; ?>

<body>
<div class="row">
<div class="col-lg-12">
<div class="wrapper wrapper-content animated fadeInUp">
    <div id="main">
        <div id="header">
            <div style="position:relative;top:+20px;left:0px;">
                <g:plusone size="medium"></g:plusone>
            </div>
            <p id="mp1">
                Smart Gate <br> QR Code scanner
            </p>
            <ul style="list-style-type:none;">
                <li style="text-align:center;"><a style="font-size:14px;" class="btn btn-primary btn-sm" href="<?=base_url('QR-Scanner')?>"><i style="margin-right:5px;" class="fa fa-camera"></i>Scan</a></li>
                <!-- <li><a href="<?=base_url('User-Login-View')?>">Back</a></li> -->
            </ul>
        </div>
        <div id="mainbody">
            <table class="tsel" border="0" width="100%">
                <tr>
                    <td valign="top" align="center" width="50%">
                        <table class="tsel" border="0">
                            <tr>
                                <!-- <td><img class="selector" id="webcamimg" src="<?=base_url()?>assets/QRscannerPage/vid.png" onclick="setwebcam()" align="left" /></td> -->
                                <td><a class="btn-lg" class="selector" id="webcamimg" onclick="setwebcam()" align="left" ><i style="margin-right:5px;color:red;font-size:25px;" class="fa fa-camera"></i></a></td>
                                <td><a class="selector" id="qrimg" src="<?=base_url()?>assets/QRscannerPage/cam.png" onclick="setimg()" align="right" style="margin-right:-13px;"><i style="color:black;font-size:25px;" class="fa fa-folder"></i></a></td>
                                <!-- <td><a class="btn-lg" class="selector" id="qrimg" onclick="setimg()" align="right" ><i style="color:red;font-size:25px;" class="fa fa-folder"></i></a></td> -->

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
                        <img style="display:none" src="<?=base_url()?>assets/QRscannerPage/down.png" />
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="center">
                        <div id="result" ></div>
                    </td>
                </tr>
            </table>
            
        </div>&nbsp;
    </div>
<canvas id="qr-canvas" width="800" height="600"></canvas>
</div>
</div>
</div>
<?php include 'layout/rightSidebar.php' ?>
<script type="text/javascript">
        load();
    </script>
</body>

<script src="<?=base_url()?>assets/QRscannerPage/jquery-1.11.2.min.js"></script>

   <!-- Mainly scripts -->
    <script src="<?= base_url()?>assets/admin/js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <!-- Custom and plugin javascript -->
    <script src="<?= base_url()?>assets/admin/js/inspinia.js"></script>
</html>