<?php
    $headerurl = $_SERVER['REQUEST_URI'];
    $headersearch1 = strstr($headerurl, "CreatePaymentUsingPayPal.php");
    $headersearch2 = strstr($headerurl, "ExecutePayment.php");

if($headersearch1){


                $desc = $response->transactions[0]->description;
				$first = strpos($desc , "-");
				$second = strpos($desc , "@");
			    $prouser_id = substr($desc , 0, $first);
				$prodate_id = substr($desc , $first + 1 , $second - 1);
				$proitem_id = substr($desc , $second + 1);

$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
$user='mosio_user';
$password='mosiopasswd';
$dbh0=new PDO($dsn,$user,$password);
$dbh0->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql0='INSERT INTO prosales (user_id,date_id,item_id,quantity,pay_id,created) VALUES (?,?,?,?,?,now())';
$stmt0=$dbh0->prepare($sql0);
$data0[]=$prouser_id;
$data0[]=$prodate_id;
$data0[]=$proitem_id;
$data0[]=$response->transactions[0]->item_list->items[0]->quantity;
$data0[]=$response->id;


$stmt0->execute($data0);

$dbh0=null;


        header("Location: $objectId");
        exit();

}elseif($headersearch2){

$dsn='mysql:dbname=_shinog_zvdlkjmc;host=mosioinstance.ctkop6q5xklf.ap-northeast-1.rds.amazonaws.com;charset=utf8';
$user='mosio_user';
$password='mosiopasswd';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql='SELECT user_id, date_id, item_id, quantity FROM prosales WHERE pay_id = ?';
$stmt=$dbh->prepare($sql);
$data[]=$response->id;
$stmt->execute($data);

$rec=$stmt->fetch(PDO::FETCH_ASSOC);
$user_id=$rec['user_id'];
$date_id=$rec['date_id'];
$item_id=$rec['item_id'];
$quantity=$rec['quantity'];

$dbh=null;


$dbh2=new PDO($dsn,$user,$password);
$dbh2->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql2='INSERT INTO points (user_id, point, created) VALUES (?,?,now())';
$stmt2=$dbh2->prepare($sql2);
$data2[]=$user_id;
$data2[]=10;

$stmt2->execute($data2);

$dbh2=null;

$dbh3=new PDO($dsn,$user,$password);
$dbh3->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

$sql3='INSERT INTO purchases (user_id,date_id,item_id,quantity,created) VALUES (?,?,?,?,(now() + INTERVAL 9 HOUR))';
$stmt3=$dbh3->prepare($sql3);
$data3[]=$user_id;
$data3[]=$date_id;
$data3[]=$item_id;
$data3[]=$quantity;


$stmt3->execute($data3);

$dbh3=null;


header("Location: http://www.mosio.me/items/thanks", FALSE);
        exit();

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="images/favicon.ico">

    <title>PayPal REST API Samples</title>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
        body {
            font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
            -webkit-font-smoothing: antialiased;
        }
        pre {
            overflow-y: auto;
            overflow-wrap: normal;
        }
        pre.error, div.error, p.error {
            border-color: red;
            color: red;
            overflow-y: visible;
            overflow-wrap: break-word;
        }
        .panel-default>.panel-heading.error {
            background-color: red;
            color: white;
        }
        .panel-title a, .home{
            font-family: Menlo,Monaco,Consolas,"Courier New",monospace;
        }
        h1.error, h2.error, h3.error, h4.error, h5.error {
            color: red;
        }
        .panel-default>.panel-heading {
            color: #FFF;
            background-color: #428bca;
            border-color: #428bca;
        }
        .row {
            margin-right: 0px;
            margin-left: 0px;
        }
        .header {
            background: #fff url("https://www.paypalobjects.com/webstatic/developer/banners/Braintree_desktop_BG_2X.jpg") no-repeat top right;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
            color: #EEE;
        }
        .header a:link, .header a:visited, .header a:hover, .header a:active {
            text-decoration: none;

        }
        /* Sticky footer styles
-------------------------------------------------- */
        html {
            position: relative;
            min-height: 100%;
        }

        body {
            /* Margin bottom by footer height */
            margin-bottom: 60px;
        }

        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
            /* Set the fixed height of the footer here */
            min-height: 60px;
            padding-top: 15px;
        }
        .footer .footer-links, .footer .footer-links li {
            display: inline-block;
            padding: 5px 8px;
            font-size: 110%;
        }
        .footer a {
            text-decoration: none;
        }

        .string { color: #428bca; }
        .number { color: darkorange; }
        .boolean { color: blue; }
        .null { color: magenta; }
        .key { color: slategray; font-weight: bold; }
        .id { color: red; }

    </style>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.2.0/js/scrollspy.min.js"></script>
    <script>
        $( document ).ready(function() {
            $("#accordion .panel-collapse:last").collapse('toggle');

            $(document.body).append('<footer class="footer"> <div class="container"> <div class="footer-div"> <ul class="footer-links"> <li> <a href="http://paypal.github.io/PayPal-PHP-SDK/" target="_blank"><i class="fa fa-github"></i> PayPal PHP SDK</a></li><li> <a href="https://developer.paypal.com/webapps/developer/docs/api/" target="_blank"><i class="fa fa-book"></i> REST API Reference</a> </li><li> <a href="https://github.com/paypal/PayPal-PHP-SDK/issues" target="_blank"><i class="fa fa-exclamation-triangle"></i> Report Issues </a> </li></ul> </div></div></footer>');


            $(".prettyprint").each(function() {
                $(this).html(syntaxHighlight($(this).html()));
            });

        });


        /* http://stackoverflow.com/questions/4810841/how-can-i-pretty-print-json-using-javascript */
        function syntaxHighlight(json) {
            json = json.replace(/&/g, '&').replace(/</g, '&lt;').replace(/>/g, '&gt;');
            return json.replace(/("(\\u[a-zA-Z0-9]{4}|\\[^u]|[^\\"])*"(\s*:)?|\b(true|false|null)\b|-?\d+(?:\.\d*)?(?:[eE][+\-]?\d+)?)/g, function (match) {
                var cls = 'number';
                if (/^"/.test(match)) {
                    if (/:$/.test(match)) {
                        cls = 'key';
                        if (match == '"id":') {
                            console.log("Matched ID" + match);
                            cls = 'key id';
                        }
                    } else {
                        cls = 'string';
                    }
                } else if (/true|false/.test(match)) {
                    cls = 'boolean';
                } else if (/null/.test(match)) {
                    cls = 'null';
                }
                return '<span class="' + cls + '">' + match + '</span>';
            });
        }
    </script>

</head>
<body>
