<?php

function prepare_sheet_api_data() {

    global $sheet_api_data, $api_key, $sheet_id;

    if(!empty($sheet_api_data['api_key']) && !empty($sheet_api_data['sheet_id'])) {

    $api_key = $sheet_api_data['api_key'];
    $sheet_id = $sheet_api_data['sheet_id'];



    } else {

    echo "Данные API не загружены";

    }

}