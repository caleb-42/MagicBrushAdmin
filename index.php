<?php require_once "scripts/php/includes/start_session.php" ;
    require_once "scripts/php/includes/functions.php";
    confirm_logged_in();
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>MagicBrush Control Panel</title>

    <!-- jQuery core for this template -->
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Bootstrap core JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Custom styles for this template -->
    <link href="./css/_css/index.css" rel="stylesheet">
    <script src="scripts/js/index.js"></script>
</head>

<body onload="showCandidates();">

    <div div id="wrapper" class="toggled">

        <div id="sidebar" class="">
            <div class="d-inline-flex d-flex float-right float-sm-left">
                <p id="dataToggler" class="m-sm-4 mr-4 mt-3 p-sm-1"><a href="#"><i style="color:#fff; transform: scale(1.3,1); opacity:.7;" class="fa fa-navicon fa-2x"></i></a></p>
            </div>
            <div class="" id="mynav">
                <div id="navmenu" class="w-100 mt-sm-4 d-inline-flex flex-column">
                    <a id="dashboard" class="mb-sm-4 active d-flex" href="#">
                            <img src="assets/dashicon-01.png">
                            <span class="ml-3 my-auto menunames">Dashboard</span>
                        </a>
                    <a id="logout" class="mb-sm-4 d-flex" href="scripts/php/logout.php">
                        <img src="assets/logicon-01.png">
                        <span class="ml-3 my-auto menunames">Logout</span>
                    </a>
                </div>
            </div>
        </div>
        <div id="main" class="container-fluid nopadding">
            <nav class="navbar py-3 px-sm-4 ">
                <h1 class="ml-sm-3" style=" font-size: 1.8rem" href="#">Dashboard</h1>
                <div class="row justify-contents-center ">
                    <img class="rounded-circle mr-2 align-self-center" src="assets/avatar.jpg">
                    <h6 class="mr-4 pr-2 align-self-center">
                        <?php echo $_SESSION['username']; ?>
                    </h6>
                </div>
            </nav>
            <div class="m-3 mt-5 px-sm-4">
                <div class="pb-5">
                    <h4 style="display:inline-block; float:left;">MagicBrush Registration</h4>
                    <button type="button" class="btn btn-danger ml-4" data-toggle = "modal" data-target = "#deleteCand" id="btndelete" style="display:inline-block; float:right;">
                        <b>Delete</b>
                    </button>
                    <button type="button" class="btn btn-success"  data-toggle = "modal" data-target = "#createCand" id="btncreate" style="display:inline-block; float:right;">
                        <b>Create</b>
                    </button>
                </div>
                <div class="table-responsive mt-4">
                    <table class="table table-striped table-bordered table-sm" width="100%">
                        <col width="5%">
                        <col width="22%">
                        <col width="5%">
                        <col width="3%">
                        <col width="5%">
                        <col width="15%">
                        <col width="10%">
                        <col width="10%">
                        <col width="3%">
                        <col width="12%">
                        <col width="8%">
                        <col width="2%">
                        <thead>
                            <tr>
                                <th style="text-align: center;">ID</th>
                                <th>NAME</th>
                                <th style="text-align: center;">AGE</th>
                                <th style="text-align: center;">GENDER</th>
                                <th style="text-align: center;">STATE</th>
                                <th style="text-align: center;">ZONE</th>
                                <th>EMAIL</th>
                                <th>MOBILE</th>
                                <th style="text-align: center;">STATUS</th>
                                <th style="text-align: center;">REG DATE</th>
                                <th style="text-align: center;">EDIT</th>
                                <th style="text-align: center;">SELECT</th>
                            </tr>
                        </thead>
                        <tbody id="candidates" class="cand">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div>

        </div>
    </div>

    <div class="modal fade" id="createCand" role="dialog" >
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-3">Create Candidate</h5>
                    <button type="button" class="close" id="closeCreateCustomer" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body nopadding">

                    <form role="form" method="post" id="create_form">
                        <div class="row mx-3 editrow">
                            <div class="col-sm-6" id="createDiv">
                                <div class="padd">
                                    <label class="text-primary inputtext">Name</label>
                                    <input type="text" name="namecreaname" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Age</label>
                                    <input type="text" name="numbcreaage" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Gender</label>
                                    <input type="text" name="gendcreagender" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">State</label>
                                    <input type="text" name="namecreastate" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Zone</label>
                                    <input type="text" name="namecreazone" class="form-control input-sm inputadjust">
                                </div>
                            </div>
                            <div class="col-sm-6" id="createDiv">
                                <div class="padd">
                                    <label class="text-primary inputtext">Email</label>
                                    <input type="text" name="mailcreaemail" class="form-control input-sm inputadjust">
                                </div>
                                <!--<div class="rest less">-->
                                <div class="padd">
                                    <label class="text-primary inputtext">Mobile</label>
                                    <input type="text" name="numbcreamobile" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Status</label>
                                    <input type="text" name="stuscreastatus" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Registration Date</label>
                                    <input type="text" name="datecreadate" class="form-control input-sm inputadjust">
                                </div>
                            </div>
                            <!--</div>-->
                        </div>
                    </form>
                    <div class="modal-footer pull-left w-100">
                        <div class="row justify-content-center w-100 d-flex flex-column">
                            <div class="my-1 align-self-center">

                                <img id="createloadgif" src="assets/magicload.gif" width="90px" height="60px" class="ml-2" style="position:absolute !important; visibility:hidden;">
                                <button type="button" class="btn bgcolor_bg " onclick="CreateCandInf();" id="btnCreate">
                                    <img src = "assets/create.png" width = "100px" height="30px">
                                </button>
                            </div>
                            <p id = "createerror" class="align-self-center" style="font-size:15px;position:absolute !important;  text-align:center;font-weight: 600; opacity:0;"></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="updCand" role="dialog" >
        <div class="modal-dialog modal-lg">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title ml-3">Edit Registration Info</h5>
                    <button type="button" class="close" id="closeUpdCustomer" data-dismiss="modal">×</button>
                </div>
                <div class="modal-body nopadding">
                    <div class="row mx-3">
                        <div class="col-sm-6">
                            <p class="text-center form-control-static text-bold mt-3">Current Info</p>
                        </div>
                        <div class="col-sm-6">
                            <p class="text-center form-control-static text-bold  mt-3">New Info</p>
                        </div>
                    </div>
                    <form role="form" method="post" id="reused_form">
                        <div class="row mx-3 editrow">
                            <div class="col-sm-6">
                                <div class="padd">
                                    <label class="text-primary inputtext">Name</label>
                                    <input type="text" name="candd0" class="form-control input-sm inputadjust" readonly>
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Age</label>
                                    <input type="text" name="candd1" class="form-control input-sm inputadjust" readonly>
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Gender</label>
                                    <input type="text" name="candd2" class="form-control input-sm inputadjust" readonly>
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">State</label>
                                    <input type="text" name="candd3" class="form-control input-sm inputadjust" readonly>
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Zone</label>
                                    <input type="text" name="candd4" class="form-control input-sm inputadjust" readonly>
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Email</label>
                                    <input type="text" name="candd5" class="form-control input-sm inputadjust" readonly>
                                </div>
                                <!-- <div class="rest less">-->
                                <div class="padd">
                                    <label class="text-primary inputtext">Mobile</label>
                                    <input type="text" name="candd6" class="form-control input-sm inputadjust" readonly>
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Status</label>
                                    <input type="text" name="candd7" class="form-control input-sm inputadjust" readonly>
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Registration Date</label>
                                    <input type="text" name="candd8" class="form-control input-sm inputadjust" readonly>
                                </div>
                                <!--</div>-->
                            </div>
                            <div class="col-sm-6" id="updDiv">
                                <div class="padd">
                                    <label class="text-primary inputtext">Name</label>
                                    <input type="text" name="namecandname" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Age</label>
                                    <input type="text" name="numbcandage" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Gender</label>
                                    <input type="text" name="gendcandgender" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">State</label>
                                    <input type="text" name="namecandstate" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Zone</label>
                                    <input type="text" name="namecandzone" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Email</label>
                                    <input type="text" name="mailcandemail" class="form-control input-sm inputadjust">
                                </div>
                                <!--<div class="rest less">-->
                                <div class="padd">
                                    <label class="text-primary inputtext">Mobile</label>
                                    <input type="text" name="numbcandmobile" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Status</label>
                                    <input type="text" name="stuscandstatus" class="form-control input-sm inputadjust">
                                </div>
                                <div class="padd">
                                    <label class="text-primary inputtext">Registration Date</label>
                                    <input type="text" name="datecanddate" class="form-control input-sm inputadjust">
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer pull-left w-100">
                        <div class="row justify-content-center w-100 d-flex flex-column">
                            <!--<div id="morelessbtn">
                                <button type="button" class="btn btn-info" onclick="moreless();" id="btnmore" style="position:absolute !important;"><img src = "assets/more.png" width = "100px" height="30px"></button>
                                <button type="button" class="btn btn-info" onclick="moreless();" id="btnless" style="position:absolute !important; opacity:0;"><img src = "assets/less.png" width = "100px" height="30px"></button>
                            </div>-->
                            <div class="my-1 align-self-center">

                                <img id="updloadgif" src="assets/magicload.gif" width="90px" height="60px" class="ml-2" style="position:absolute !important; visibility:hidden;">
                                <button type="button" class="btn bgcolor_bg " onclick="updateCandInf(this.value);" id="btnUpd" value="" >
                                    <img src = "assets/update.png" width = "100px" height="30px">
                                </button>
                            </div>
                            <p id = "upderror" class="align-self-center" style="font-size:15px;position:absolute !important;  text-align:center;font-weight: 600; opacity:0;"></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>


    </script>
</body>

</html>
