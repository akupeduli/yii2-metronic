<?php

return [
    [
        'label' => "Dashboard",
        "url" => ["site/index"],
        "icon" => "flaticon-line-graph",
        "badge" => [
            "label" => 2,
            "type" => "danger"
        ]
    ], [
        "label" => "Components"
    ], [
        "label" => "Base",
        "icon" => "flaticon-layers",
        "items" => [
            [
                "label" => "Dropdown",
                "url" => ["site/dashboard"],
            ], [
                "label" => "Tabs",
                "items" => [
                    [
                        "label" => "Tabs A",
                        "url" => ["site/dashboard"],
                    ], [
                        "label" => "Tabs B",
                        "url" => ["site/dashboard"],
                    ]
                ]
            ]
        ]
    ]
];
