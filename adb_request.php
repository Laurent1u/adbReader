<?php
$submit = $_POST['submit'];

$phone_info_details = [];
$phone_id = null;
$phone_imei = null;
if (isset($submit)) {
    $adb_path = "C:\adb";
    $dir = chdir($adb_path);

    $phone_id_info = shell_exec('adb devices');
    preg_match("/(?<=\battached\s)(\w+)/m", $phone_id_info, $phone_id);
    $phone_id = $phone_id[0];

    $phone_imei_info = shell_exec('adb shell service call iphonesubinfo 1');
    preg_match_all("/\'(.*?)\'/m", $phone_imei_info, $phone_imei);
    $phone_imei = $phone_imei[0];
    $phone_imei = str_replace(".", '', $phone_imei);
    $phone_imei = str_replace("'", '', $phone_imei);
    $phone_imei = str_replace(" ", '', $phone_imei);
    $phone_imei = implode('', $phone_imei);
    $phone_info = shell_exec('adb shell getprop');


    if (isset($phone_info)) {
        $phone_data = str_replace(' ', '', $phone_info);
        $phone_data = str_replace('[', '', $phone_data);
        $phone_data = str_replace(']', '', $phone_data);
        $phone_data = str_replace("\n", ',', $phone_data);

        $phone_info_array = explode(',', $phone_data);

        foreach ($phone_info_array as $data) {
            $array = explode(':', $data);

            if (isset($array[1]))
                $phone_info_details[$array[0]] = $array[1];
        }
    }
}