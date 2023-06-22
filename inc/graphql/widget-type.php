<?php

register_graphql_object_type(
    'Sidebar',
    [
        'fields' => [
            'text' => [ 'type' => 'String' ],
        ],
    ]
);

register_graphql_field(
    'RootQuery',
    'sidebar',
    [
        'type'        => 'Sidebar',
        'description' => 'a poll',
        'args'        => [
            'id' => [
                'type' => [
                    'non_null' => 'String',
                ],
            ],
        ],
        'resolve' => function ( $source, array $args, $context, $info )  {
            global $wp_registered_sidebars, $wp_registered_widgets;
            ob_start();
            dynamic_sidebar($args["id"]);
            $sidebar = ob_get_contents();
            ob_end_clean();

            return [
                'text' => $sidebar,
            ];
        },
    ]
);