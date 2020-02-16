<?php

return [
    //########## Business Info ##########
    'company' => '', //Name Of the Company

    'logo' => '', //Logo Location Path or url

    'address' => '', //Company Address

    'contact' => '', //Contact Number

    'state' => '', //State

    'city' => '', //City

    'post_code' => '', //Post Code
    //########## /Business Info ##########



    //########## Basic Settings ##########
    'new_register' => 100, //NEW REGISTRATION POINT WITHOUT REFERENCE

    'new_register_by_ref' => 200, //NEW REGISTRATION BY REFERENCE POINT

    'referer_point' => 80, //NEW REGISTRATION REFERER POINT

    'sales_point_value' => 10, //SALES FOR EVERY $10 GET 1 POINT

    'salesman_commission' => 5, //SALESMAN COMMISSION (%)

    'distributor_commission' => 2, //DISTRIBUTOR COMMISSION (%)

    'default_salesman_id' => 7, //If customer register without reference code. Using their Ref-Code

    'default_distributor_id' => 8, //If customer register without reference code. Using their Ref-Code

    //########## /Basic Settings ##########
];
