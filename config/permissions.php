<?php
$config= [
    "list" => [
        'show financial reports' => [
            "dashboard.reports.course",
            "dashboard.reports.packages"
        ],
        'show course' => [
            "dashboard.course.all",

        ],
        "show students"=>[
            "dashboard.students.all"
        ],
        "show certificate list"=>[
            "dashboard.reports.certificate"
        ],
        "create certificate"=>[
            "dashboard.reports.certificate.create",
            "dashboard.reports.certificate.store"
        ],
        "show user"=>[
            "dashboard.users.all"
        ],
        "edit user"=>[
            "dashboard.users.edit",

        ],
        "create user"=>[
            "dashboard.users.create",
            "dashboard.users.update",
            "dashboard.users.store"

        ],

        "show role"=>[
            "dashboard.role.all"
        ],
        "create role"=>[
            "dashboard.role.create",
            "dashboard.role.update",
            "dashboard.role.store",

        ],
        "edit role"=>[
            "dashboard.role.edit"
        ],
        "show application"=>[
            "dashboard.reports.from.list",
            "dashboard.reports.from.show",

        ],

    ],



];

$url=[];
foreach ($config["list"] as $key=>$value){
    foreach ($value as $k=>$v){
        $url[$v]=$key;
    }
}

$config["url"]=$url;



return $config;
