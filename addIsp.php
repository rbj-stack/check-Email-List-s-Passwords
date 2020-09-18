
<?php 
if(!empty( $_POST['isp'] ) &&!empty( $_POST['protocol'] )&&!empty( $_POST['port'] )){ 

    $isp = $_POST['isp'];
    $protocol = $_POST['protocol'];
    $port = $_POST['port'];
    $my_file = 'hoster.dat';
    $content = file_get_contents($my_file);
    $content .= "\r\n" .$isp.":".$protocol.":".$port;
    file_put_contents($my_file, $content);

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>Check Address Email </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>

        .add{
            float: right;
        }

    </style>
</head>  

<body>
<!-- style="max-width:40%; margin-left:30%; margin-left:30% ;margin-top:20px"  -->
<div class="container-fluid " style="margin-top:100px;max-width:1350px;">

    
        <div class="row">
        
                <div class="jumbotron col-md-12 " style="max-width:60%; margin-right:20%; margin-left:20%">
                    <a class="btn btn-outline-info btn-sm" style="margin-top:0px;" href="index.php"><i class="fas fa-arrow-circle-left"></i> Back</a>
                    <br><br><br>
                    <h3 class="h3" style="text-align: center">Add protocol </h3><br>
                    <form class="text-align:center" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post"  >
                        <div class="form-group">
                            <label >Email isp    :</label> 
                            <input name="isp" class="form-control" type="text" placeholder="enter isp " required>
                        </div>
                        <div class="form-group">
                            <label >Email protocol  :</label> 
                            <input  name="protocol"class="form-control" type="text" placeholder="enter domain " required>
                        </div>
                        <div class="form-group">
                            <label >Port  :</label> 
                            <input name="port" class="form-control " type="text" placeholder="enter port " required>
                        </div>
                            <button type="submit" class="btn btn-info btn-lg btn-block" style="margin-bottom:50px"id="check"> &nbsp Add &nbsp </button>
                        </form>
                </div>
        </div>

    </div>
</body>
</html>
