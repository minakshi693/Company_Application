<?php
session_start();
include("config.php");
error_reporting(0);

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database</title>
</head>
<style>
h1 {
            font-size: 24px;
            letter-spacing: 2px;
            text-transform: uppercase;
            padding: 10px;
            margin: 10px;


        }

        @media screen and (max-width: 600px) {
            tr {
                display: block;
            }

            td {
                display: block;
                width: 100%;
            }
        }


        table {
            width: 100%;
            margin: 20px;
            border-collapse: collapse;
        }

        button {
            font-size: 14px;
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            background-color: #FFD0EC;
            box-sizing: border-box;
            padding: 5px 10px;
            margin: 2px;
            border-radius: 10px;
        }

        button:hover {
            background-color: #7FC7D9;
        }

        th,
        td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2f2;
        }

        tr:nth-child(even) {
            background-color: #f8f8f8f8;
        }

        tr:hover {
            background-color: #F5EEE6;
        }

        button {
            box-sizing: border-box;
        }
    </style>
<body>
    <h1>User Records</h1>
    <table>
        <tr>
            <th>Name of Category</th>
            <th>Name of Organization</th>
            <th>Address</th>
            <th>Contact Number</th>
            <th>Email-Id</th>
            <th>MD/CEO/Head/Name</th>
            <th>Designation</th>
            <th>Contact Number </th>
            <th>Head E-mail</th>
            <th>Representative Name</th>
            <th>Designation</th>
            <th>Contact Number </th>
            <th>E-mail ID</th>
            <th>Sales Turn Over</th>
            <th>GST Number</th>
            <th>GST FILE</th>
            <th>IEC Number</th>
            <th>IEC FILE</th>
            <th>PAN Number</th>
            <th>PAN FILE</th>
            <th>Classification</th>
            <th>Type of Industries</th>
            <th>Activity</th>
            <th>Enclosed</th>
        </tr>
        <?php
        $sql = "SELECT * FROM user_form";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <tr>
                    <td>
                        <?php echo $row['memcategory']; ?>
                    </td>
                    <td>
                        <?php echo $row['name_of_org']; ?>
                    </td>
                    <td>
                        <?php echo $row['address']; ?>
                    </td>
                    <td>
                        <?php echo $row['contact']; ?>
                    </td>
                    <td>
                        <?php echo $row['email']; ?>
                    </td>
                    <td>
                        <?php echo $row['ceo_headname']; ?>
                    </td>
                    <td>
                        <?php echo $row['designation']; ?>
                    </td>
                    <td>
                        <?php echo $row['headcontact']; ?>
                    </td>
                    <td>
                        <?php echo $row['heademail']; ?>
                    </td>
                    <td>
                        <?php echo $row['repname']; ?>
                    </td>
                    <td>
                        <?php echo $row['repdesignation']; ?>
                    </td>
                    <td>
                        <?php echo $row['repcontact']; ?>
                    </td>
                    <td>
                        <?php echo $row['repemail']; ?>
                    </td>
                    <td>
                        <?php echo $row['sales']; ?>
                    </td>
                    <td>
                        <?php echo $row['gst']; ?>
                    </td>
                    <td>
                        <button><a href="gst/<?php echo $row['gst_img']; ?>" target="_blank">GST FILE</a></button>
                    </td>
                    <td>
                        <?php echo $row['iec']; ?>
                    </td>
                    <td>
                        <button><a href="iec/<?php echo $row['iec_file']; ?>" target="_blank">IEC FILE</a></button>

                    </td>

                    <td>
                        <?php echo $row['pan']; ?>
                    </td>
                    <td>
                        <button><a href="pan/<?php echo $row['pan_file']; ?>" target="_blank">PAN FILE</a></button>

                    </td>
                    <td>
                        <?php echo $row['classifaction']; ?>
                    </td>
                    <td>
                        <?php echo $row['industries']; ?>
                    </td>
                    <td>
                        <?php echo $row['activity']; ?>
                    </td>
                    <td>
                        <?php echo $row['pay']; ?>
                    </td>
                </tr>
                <?php
            }

        } else {
            echo "NO DATA FOUND";
        }
        ?>


</body>

</html>