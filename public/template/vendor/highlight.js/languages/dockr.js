/*
Language: DockR
Description: DockR - Used for and Created by DockR
Contributors: Sharan Velu <sharanvelu@outlook.com>
Category: common, config
Website: https://docs.dockr.in
*/

export default function(hljs) {
    let COMMENTS = hljs.HASH_COMMENT_MODE;
    return {
        name: "DOCKR",
        aliases: ["dockr"],
        case_insensitive: !0,
        keywords: {
            dt_dockr: 'dockr',
            dt_built_in: 'bash down help image port ps shell status stop up',
            dt_asset: 'asset config mysql postgres psql redis',
            dt_laravel: 'art artisan bin composer make migrate node npm php phpunit queue seed test tinker yarn'
        },
        contains: [
            COMMENTS,
            {
                className: "section",
                begin: /\[+/,
                end: /\]+/
            },
            {
                className: "section",
                begin: /\<+/,
                end: /\>+/
            },
        ]
    };
}
