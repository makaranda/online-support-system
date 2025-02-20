<?php

return [

    //User model related constants
    'user_statuses' => [

        'De-Active' => 0,
        'Active'    => 1,

    ],

    //Sidebar module routes

    'sidebar_modules' => [
        'users.index',
        'modules.index',
    ],

    //Usertype module routes

    'usertype_statuses' => [
        0 => 'De-Active',
        1 => 'Active',
    ],

    //Department module routes

    'department_statuses' => [
        0 => 'De-Active',
        1 => 'Active',
    ],


    //Branches module routes

    'branch_statuses' => [
        0 => 'De-Active',
        1 => 'Active',
    ],

    'customer_types' => [
        0 => 'Not Specified',
        1 => 'Individual / Private',
        2 => 'Small Medium Enterprise',
        3 => 'Corporate',
        4 => 'VIP',
        5 => 'VVIP',
    ]


];
