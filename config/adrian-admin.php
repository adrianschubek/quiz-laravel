<?php
/**
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */

return [
    "enabled" => env("ADRIAN_ADMIN_ENABLED", true),

    // Url Prefix
    "prefix" => "admin",

    // light / dark
    "theme" => "dark",

    "auth" => [
        "user" => [
            "enabled" => env("ADRIAN_ADMIN_USER_ENABLED", true),
            "ids" => [501]
        ],
        "password" => [
            "enabled" => env("ADRIAN_ADMIN_PASSWORD_ENABLED", false),
            "password" => env("ADRIAN_ADMIN_PASSWORD", "password")
        ]
    ],
];
