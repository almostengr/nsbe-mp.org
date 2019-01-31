$view = new view();
$view->name = 'photo_gallery';
$view->description = '';
$view->tag = 'default';
$view->base_table = 'node';
$view->human_name = 'Photo Gallery';
$view->core = 7;
$view->api_version = '3.0';
$view->disabled = FALSE; /* Edit this to true to make a default view disabled initially */

/* Display: Master */
$handler = $view->new_display('default', 'Master', 'default');
$handler->display->display_options['title'] = 'Photo Gallery';
$handler->display->display_options['use_more_always'] = FALSE;
$handler->display->display_options['access']['type'] = 'perm';
$handler->display->display_options['cache']['type'] = 'none';
$handler->display->display_options['query']['type'] = 'views_query';
$handler->display->display_options['exposed_form']['type'] = 'basic';
$handler->display->display_options['pager']['type'] = 'full';
$handler->display->display_options['pager']['options']['items_per_page'] = '';
$handler->display->display_options['pager']['options']['offset'] = '0';
$handler->display->display_options['pager']['options']['id'] = '0';
$handler->display->display_options['pager']['options']['quantity'] = '9';
$handler->display->display_options['style_plugin'] = 'grid';
$handler->display->display_options['style_options']['row_class_special'] = FALSE;
$handler->display->display_options['style_options']['columns'] = '1';
$handler->display->display_options['style_options']['alignment'] = 'vertical';
$handler->display->display_options['row_plugin'] = 'fields';
/* Field: Content: Title */
$handler->display->display_options['fields']['title']['id'] = 'title';
$handler->display->display_options['fields']['title']['table'] = 'node';
$handler->display->display_options['fields']['title']['field'] = 'title';
$handler->display->display_options['fields']['title']['label'] = '';
$handler->display->display_options['fields']['title']['element_label_colon'] = FALSE;
/* Field: Content: Image */
$handler->display->display_options['fields']['field_gallery']['id'] = 'field_gallery';
$handler->display->display_options['fields']['field_gallery']['table'] = 'field_data_field_gallery';
$handler->display->display_options['fields']['field_gallery']['field'] = 'field_gallery';
$handler->display->display_options['fields']['field_gallery']['label'] = '';
$handler->display->display_options['fields']['field_gallery']['element_label_colon'] = FALSE;
$handler->display->display_options['fields']['field_gallery']['click_sort_column'] = 'fid';
$handler->display->display_options['fields']['field_gallery']['settings'] = array(
  'image_style' => 'thumbnail',
  'image_link' => 'content',
);
$handler->display->display_options['fields']['field_gallery']['delta_limit'] = '5';
$handler->display->display_options['fields']['field_gallery']['delta_offset'] = '0';
$handler->display->display_options['fields']['field_gallery']['separator'] = ' ';
/* Filter criterion: Content: Published */
$handler->display->display_options['filters']['status']['id'] = 'status';
$handler->display->display_options['filters']['status']['table'] = 'node';
$handler->display->display_options['filters']['status']['field'] = 'status';
$handler->display->display_options['filters']['status']['value'] = 1;
$handler->display->display_options['filters']['status']['group'] = 1;
$handler->display->display_options['filters']['status']['expose']['operator'] = FALSE;
/* Filter criterion: Content: Type */
$handler->display->display_options['filters']['type']['id'] = 'type';
$handler->display->display_options['filters']['type']['table'] = 'node';
$handler->display->display_options['filters']['type']['field'] = 'type';
$handler->display->display_options['filters']['type']['value'] = array(
  'photogallery' => 'photogallery',
);

/* Display: Page */
$handler = $view->new_display('page', 'Page', 'page');
$handler->display->display_options['path'] = 'photo-gallery';

