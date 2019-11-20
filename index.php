<?php require_once 'adb_request.php'; ?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Date Telefon</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" crossorigin="anonymous">
</head>
<body style="height: 100vh;">
<div class="container h-100">
    <div class="row d-flex justify-content-center mb-5">
        <div class="col-md-6 h-100" style="margin-top: 10%;">
            <form action="" method="post">
                <p>Id Dispozitiv: <?php echo $phone_id; ?></p>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="sn" class="input-group-text">Sn</label>
                    </div>
                    <input type="text" class="form-control" name="sn" id="sn" value="<?php echo $phone_info_details['ril.serialnumber'] ?: $phone_info_details['ro.serialno']; ?>">
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="imei" class="input-group-text">Imei</label>
                    </div>
                    <input type="text" class="form-control" name="imei" id="imei" value="<?php echo $phone_imei; ?>">
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="producer" class="input-group-text">Producator</label>
                    </div>
                    <input type="text" class="form-control" name="producer" id="producer" value="<?php echo strtoupper($phone_info_details['ro.product.brand']); ?>">
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="model" class="input-group-text">Model</label>
                    </div>
                    <input type="text" class="form-control" name="model" id="model" value="<?php echo $phone_info_details['ro.product.model']; ?>">
                </div>

                <div class="input-group">
                    <div class="input-group-prepend">
                        <label for="model-commercial" class="input-group-text">Model Comercial</label>
                    </div>
                    <input type="text" class="form-control" name="model-commercial" id="model-commercial" value="<?php echo $phone_info_details['ril.product_code'] ?: $phone_info_details['ro.config.marketing_name']; ?>">
                </div>

                <input type="submit" class="btn btn-primary w-100" name="submit" value="Culege Date">
            </form>
        </div>
    </div>

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <ul class="list-group">
                <?php foreach ($phone_info_details as $key => $detail) { ?>
                    <li class="list-group-item"><?php echo $key . ': <b>' . $detail . '</b>'; ?></li>
                <?php } ?>
            </ul>
        </div>
    </div>
    </div>
</div>
</body>
</html>
