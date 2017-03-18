<?php
/**
 * @param FW_Ext_Backups_Demo[] $demos
 * @return FW_Ext_Backups_Demo[]
 */
function flexity_backups_demos($demos) {
    $demos_array = array(
        'flexity-demo-id' => array(
            'title' => esc_html__('Flexity Demo 1', 'flexity'),
            'screenshot' => 'http://flexity-wp.stockware.ru/demo/screenshot.png',
            'preview_link' => 'http://flexity-wp.stockware.ru',
        ),
        'flexity2-demo-id' => array(
            'title' => esc_html__('Flexity Demo 2', 'flexity'),
            'screenshot' => 'http://flexity-wp.stockware.ru/demo/screenshot.png',
            'preview_link' => 'http://flexity-wp-demo2.stockware.ru',
        ),
    );

    $download_url = 'http://flexity-wp.stockware.ru/demo/index.php';

    foreach ($demos_array as $id => $data) {
        $demo = new FW_Ext_Backups_Demo($id, 'piecemeal', array(
            'url' => $download_url,
            'file_id' => $id,
        ));
        $demo->set_title($data['title']);
        $demo->set_screenshot($data['screenshot']);
        $demo->set_preview_link($data['preview_link']);

        $demos[ $demo->get_id() ] = $demo;

        unset($demo);
    }

    return $demos;
}
add_filter('fw:ext:backups-demo:demos', 'flexity_backups_demos');