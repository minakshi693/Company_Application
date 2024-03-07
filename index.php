<?php
session_start();
include("config.php");
error_reporting(0);
if(isset($_POST['submit'])){
$incaptcha = $_POST['captcha_code'];
$category = $_POST['category'];
$orgname = $_POST['orgname'];
$address = $_POST['address'];
$orgnum = $_POST['orgnum'];
$orgemail = $_POST['orgemail'];
$headname = $_POST['headname'];
$headdesignation = $_POST['headdesignation'];
$headnum = $_POST['headnum'];
$heademail = $_POST['heademail'];
$repname = $_POST['repname'];
$repdesignation = $_POST['repdesignation'];
$repnum = $_POST['repnum'];
$repemail = $_POST['repemail'];
$sale = $_POST['sale'];
$gst = $_POST['gst'];
$gst_file = $_FILES['img1']['name'];
$gtemp_file = $_FILES['img1']['tmp_name'];
$iec = $_POST['iec'];
$iec_file = $_FILES['img2']['name'];
$itemp_file = $_FILES['img2']['tmp_name'];
$pan = $_POST['pan'];
$pan_file = $_FILES['img3']['name'];
$ptemp_file = $_FILES['img3']['tmp_name'];
$classification  = $_POST['classification'];
$industry = $_POST['industry'];
$activity = $_POST['activity'];
$enclosed = $_POST['enclosed'];

$upload_gst = $_SERVER['DOCUMENT_ROOT'] . "/mini/applicationform/gst/";
move_uploaded_file($gtemp_file, $upload_gst . $gst_file);
$upload_path1 = $upload_gst . $gst_file;

$upload_iec = $_SERVER['DOCUMENT_ROOT'] . "/mini/applicationform/iec/";
move_uploaded_file($itemp_file, $upload_iec . $iec_file);
$upload_path2 = $upload_iec . $iec_file;

$upload_pan = $_SERVER['DOCUMENT_ROOT'] . "/mini/applicationform/pan/";
move_uploaded_file($ptemp_file, $upload_pan . $pan_file);
$upload_path3 = $upload_pan . $pan_file;




$sql = "INSERT INTO user_form VALUES('','$category','$orgname','$address','$orgnum','$orgemail','$headname','$headdesignation','$headnum','$heademail','$repname','$repdesignation','$repnum','$repemail','$sale','$gst','$gst_file','$iec','$iec_file','$pan','$pan_file','$classification','$industry','$activity','$enclosed')";
$result = mysqli_query($conn,$sql);
if($result){
    echo "<script>alert('Your Data Is Added Successfully')</script>";
    echo '<script>window.location = "view.php"</script>';
}
else{
    echo "<script>alert('Failed to Add Your Data')</script>";
  
}

}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="application/javascript">
        function validation() {

            var allowedFiles = [".pdf"];
            var fileUpload = document.getElementById("file");
            var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
            if (!regex.test(fileUpload.value.toLowerCase())) {
                alert("Please upload files having extensions: " + allowedFiles.join(', ') + " only.");
                return false;
            }
            return true;

        }
    </script>
    <!-- <script>function refresh_captcha() { return document.getElementById("captcha_code").value = "", document.getElementById("captcha_code").focus(), document.images.captchaimg.src = document.images.captchaimg.src.substring(0, document.images.captchaimg.src.lastIndexOf("?")) + "?rand=" + 1e3 * Math.random() }</script> -->
    <style>
        .form-container{
            width: 70%;
            margin: 0 auto;
        }
        .row {
            line-height: 1em;
            margin-right: 0px;
            margin-left: 0px;
        }

        input[type=text],
        input[type=email],
        select,
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            resize: vertical;
            line-height: normal;
        }

        label {
            padding: 12px 12px 12px 0;
            display: inline-block
        }

        input[type=submit] {
            background-color: #4caf50;
            color: #fff;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049
        }

        .container1 {
            border-radius: 5px;
            padding: 10px;
        }

        .col-25 {
            float: left;
            width: 25%;
            margin-top: 6px;
            max-width: 200px;
        }

        .col-75 {
            float: left;
            width: 75%;
            margin-top: 6px
        }

        .row:after {
            content: "";
            display: table;
            clear: both
        }

        .h1 {
            border-bottom: 1px dotted #000000f0;
            margin: 10px 0px;
            padding-bottom: 5px;
            color: black;
            font-size: 24px;
        }

        .abc {
            border-bottom: 1px dotted #000000f0;

        }


        .captcha input[type=text] {
            width: 50%;
        }

        .captcha img {
            float: left;
            margin-right: 5px;
        }



        form {
            border-style: solid;
            border-color: #387ADF;
            margin-top: 10px;
            border-width: 5px;
            padding: 20px;
           
        }
    </style>
</head>

<body>
<div class="banner">
            <img src="ban.png">
        </div>
    <div class="form-container">
      
        <div id=subheader style="display: flex;">
            <div class=container>
                <div class=row>
                    <div class=col-md-12>
                        <h1 itemprop=name style="color:#211951;padding-left:200px">Membership Application Form (Gujarat
                            State)</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="wrapper1">
        <div class="container1">
            <form id="contact" name="form1" enctype="multipart/form-data" method="post">
                <h3 class="h1">To <br> The President <br>
                </h3>

                <div class="row abc">
                    <div class="col-25">
                        <label for="lname">Membership Category</label>
                    </div>
                    <div class="col-75">
                        <input type="radio" name="category" value="Corporate" id="Corporate" required> <label
                            for="Corporate">Corporate</label>
                        <input type="radio" name="category" value="Institutional" id="Institutional"> <label
                            for="Institutional">Institutional</label>
                        <input type="radio" name="category" value="Individual" id="Individual"> <label
                            for="Individual">Individual</label>



                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="fname">Name of Organization </label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="org_name" name="orgname" placeholder="Your Organization Name" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lname">Address</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="address" name="address" placeholder="Your Organization Address" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Contact Number </label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="org_num" name="orgnum" placeholder="Your Organization Contact Number"
                            pattern="[0-9]{10}" maxlength="10"required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lname">E-mail ID</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="org_email" name="orgemail" placeholder="Your Organization Email"
                            required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">MD/CEO/Head/Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="head_name" name="headname"
                            placeholder="Your Organization MD/CEO/Head Name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Designation</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="head_designation" name="headdesignation"
                            placeholder="Your  Organization MD/CEO/Head's Designation" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Contact Number </label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="head_num" name="headnum"
                            placeholder="Your Organization MD/CEO/Head's Mobile Number" maxlength="10" pattern="[0-9]{10}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lname">E-mail ID</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="head_email" name="heademail"
                            placeholder="Your  Organization MD/CEO/Head's Email" required>
                    </div>
                </div>

                <!-- Repe -->
                <div class="row">
                    <div class="col-25">
                        <label for="lname">Representative Name</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="representative_name" name="repname"
                            placeholder="Your Organization Representative Name" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Designation</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="representative_designation" name="repdesignation"
                            placeholder="Your Organization Representative's Designation" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Contact Number </label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="representative_num" name="repnum"
                            placeholder="Your Organization Representative's Mobile Number" maxlength="10" pattern="[0-9]{10}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="lname">E-mail ID</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="representative_email" name="repemail"
                            placeholder="Your  Organization Representative's Email" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Sales Turn Over<br><br>(Rupees in crore) </label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="sale" name="sale" placeholder="Your  Organization Sales Turn Over"
                            required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">GST Number</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="gst" name="gst" maxlength="15" placeholder="Your  Organization GST Number" required><br><br>
                        <input type="file" name="img1" id="file" placeholder="Attachment" accept=".pdf" required/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">IEC Number</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="iec" name="iec" maxlength="10" placeholder="IEC No.of Units" required><br><br>
                        <input type="file" name="img2" id="file" placeholder="Attachment" accept=".pdf" required/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">PAN Number</label>
                    </div>
                    <div class="col-75">
                        <input type="text" id="pan" name="pan" maxlength="10" placeholder="PAN Number" required><br><br>
                        <input type="file" name="img3" id="file" placeholder="Attachment" accept=".pdf" required/>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Classification </label>
                    </div>
                    <div class="col-75">
                        
                        <!-- <input type="radio"> -->
                        <input type="radio" name="classification" value="MSME" id="MSME" required> <label for="MSME">
                            MSME</label>
                        <input type="radio" name="classification" value="LARGE" id="LARGE"> <label for="LARGE">
                            LARGE</label>
                        <input type="radio" name="classification" value="MNC" id="MNC"> <label for="MNC"> MNC</label>
                        <input type="radio" name="classification" value="100%EOU" id="100%EOU"> <label for="100%EOU">
                            100%EOU</label>
                        <input type="radio" name="classification" value="other" id="other"> <label for="other">
                            Other</label>


                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Type of Industries</label>
                    </div>
                    <div class="col-75">
                       
                        <input type="radio" name="industry" value="Chemicals" id="Chemicals" required> <label for="Chemicals">
                            Chemicals</label>
                        <input type="radio" name="industry" value="Pharmaceuticals" id="Pharmaceuticals"> <label
                            for="Pharmaceuticals"> Pharmaceuticals</label>
                        <input type="radio" name="industry" value="Engineering/Machinery" id="Engineering"> <label
                            for="Engineering">
                            Engineering</label><br>
                        <input type="radio" name="industry" value="Plastics" id="Plastics"> <label for="Plastics">
                            Plastics</label>
                        <input type="radio" name="industry" value="Food Processing" id="Food Processing"> <label
                            for="Food Processing"> Food Processing</label>
                        <input type="radio" name="industry" value="Machinery" id="Machinery"> <label for="Machinery">
                            Machinery</label>
                        <input type="radio" name="industry" value="other" id="other1"> <label for="other1">
                            Other</label>


                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Activity</label>
                    </div>
                    <div class="col-75">
                        <input type="radio" name="activity" value="Manufacturing" id="Manufacturing" required> <label
                            for="Manufacturing"> Manufacturing</label>
                        <input type="radio" name="activity" value="Professional" id="Professional"> <label
                            for="Professional"> Professional</label>
                        <input type="radio" name="activity" value="Service" id="Service"> <label for="Service Provider">
                            Service Provider</label>
                        <input type="radio" name="activity" value="Trading" id="Trading"> <label for="Trading">
                            Trading</label><br>
                        <input type="radio" name="activity" value="Other" id="Other"> <label for="Other"> Other</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-25">
                        <label for="lname">Enclosed</label>
                    </div>
                    <div class="col-75">
                        <input type="radio" name="enclosed" value="Cheque" id="Cheque" required> <label for="Cheque">
                            Cheque</label>
                        <input type="radio" name="enclosed" value="NEFT" id="NEFT"> <label for="NEFT"> NEFT</label>
                        <input type="radio" name="enclosed" value="UPI" id="UPI"> <label for="UPI">UPI</label>
                        <input type="radio" name="enclosed" value="QR Code" id="QR Code"> <label for="QR Code">QR
                            Code</label>



                    </div>
                </div>

                <div class="row">

                    <b>Bank Details: </b><b> Bank Name: </b> Union Bank of India | <b>Branch: </b>Alkapuri | <b>A/C No.:
                    </b>520141001227201 <br><br>
                    <b>IFSC Code: </b> UBIN0903361
                    <br><br>
                    <b>Cheque to be drawn in favor of "EXIM CLUB"</br><br>
                        <b>We agree to abide by the constitution of Exim Club in force from time to time.</b>
                        <br>
                </div><br>
                <!-- <div class="row">
                    <div class="col-25">
                        <label for="subject">Enter Security Code</label>
                    </div>
                    <div class="col-75 captcha">
                        <img src="captcha.php?rand=1250387661" id="captchaimg" alt="Pooja Infotech" height="50"
                            width="150" name="captchaimg">
                        <input placeholder="Captcha" type="text" tabindex="2" id="captcha_code" name="captcha_code"
                            required><br>Can't read the above code? <a class="ccc" href="javascript:void(0);"
                            onClick="refresh_captcha();">Refresh</a>
                    </div>
                </div> -->

                <div class="row">
                    <br>
                    <center><input type="submit" value="Submit" name="submit"></center>
                </div>
            </form>
        </div>
        <br>
</body>

</html>