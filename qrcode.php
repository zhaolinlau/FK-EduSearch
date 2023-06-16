<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>QR Code</title>
  <script src="https://cdn.jsdelivr.net/gh/davidshimjs/qrcodejs@gh-pages/qrcode.min.js"></script>
</head>

<body>
  <div id="qrcode"></div>
  <script>
    var data = "<?php echo 'https://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/user_profile.php' . '?UserID=' . $_GET['UserID'] ?>";

    var qrcode = new QRCode(document.getElementById("qrcode"), {
      text: data,
      width: 128,
      height: 128
    });

    var imageSrc = document.getElementById("qrcode").toDataURL("image/png");
    var newTab = window.open();
    newTab.document.write("<img src='" + imageSrc + "'/>");
    newTab.document.close();
  </script>
</body>

</html>
