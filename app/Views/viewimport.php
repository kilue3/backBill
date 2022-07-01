<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    
    <link href="../index.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Mitr:wght@100|Prompt|Trirong|Inter:wght@700&display=swap" rel="stylesheet"><!--Google Font-->

    <title>เพิ่มรายชื่อนักเรียน - ระบบการให้บริการสารสนเทศทุนการศึกษา ฯ</title>
    
    <style>
        .alert {
            border : 0px;
            max-width: 550px;
            margin-bottom: 10px;
            padding-top: 10px;
            padding-bottom: 10px;
        }

        .card_danger {
            color : #842029;
            background-color : #f8d7da;
            border : 0px;
            max-width: 550px;
            padding : 10px 16px 10px 16px;
            border-radius : 0px 0px 10px 10px;

            margin-top : -15px;
        }
    </style>
</head>

<body>
    <div style="padding-top: 20px; padding-bottom: 20px; color: rgb(248, 129, 58);" align="center">
        <h4>
            ระบบการให้บริการสารสนเทศทุนการศึกษา ฯ
        </h4>
    </div>

    <div class="container-fluid TZS-Container" align="center">

        <div class="card HeaderShadow" style="margin-top: 20px; max-width: 550px" align="left">
            <div class="card CardHeaderStyle-Home">
                <h5 style="margin: 0px;">
                    <img class="buttonMenuIcon" src="https://tzs-global.com/website_factor-image/button_icon/person_add_alt_1.png" />
                    เพิ่มรายชื่อนักเรียน
                </h5>
            </div>
        </div>
        
        <div class="CardHeaderDetail" style="max-width: 550px" align="left">
            <div class="card-body CardBody">
                เพิ่มรายชื่อนักเรียนโดยใช้ไฟล์ Excel
                <div class="borderline"></div>
                <?php echo form_open_multipart('http://localhost:8080/Mback/public/Import/upload'); ?>
                <?php
                    $session = \config\Services::session();
                    if (!empty($session->getFlashdata('pesan'))) {
                        echo '<div class="alert alert-danger alert-bottom" role="alert">
                    ' . $session->getFlashdata('pesan') . '
                    </div>';
                    };
                    $session = \config\Services::session();
                    if (!empty($session->getFlashdata('addalert'))) {
                        echo '<div class="alert alert-success alert-top" role="alert">
                        ' . $session->getFlashdata('addalert') . '
                        </div>';
                        echo '<div class="alert alert-warning alert-bottom" role="alert">
                        ' . $session->getFlashdata('addalert_error') . '
                        </div>';
                    };
                ?>
                <div align="center">
                    <input class="form-control" name="fileimport" type="file" accept=".xls, .xlsx" >
                </div>
                <div class="borderline"></div>
                <div align="center">
                    <button type="submit" class="btn btn-success Button-Style">
                        <img class="Button-icon" src="https://tzs-global.com/website_factor-image/button_icon/save_alt_white.png" style="transform:rotate(180deg)"/>
                        อัพโหลดรายชื่อ
                    </button>
                </div>
                
                <?php echo form_close(); ?>
            </div>
        </div>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

</body>

</html>