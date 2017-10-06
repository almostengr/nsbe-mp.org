<?php
/**
 * @file
 * nsbe_mp_org.backup_migrate_exportables.inc
 */

/**
 * Implements hook_exportables_backup_migrate_destinations().
 */
function nsbe_mp_org_exportables_backup_migrate_destinations() {
  $export = array();

  $item = new stdClass();
  $item->disabled = FALSE; /* Edit this to true to make a default item disabled initially */
  $item->api_version = 1;
  $item->machine_name = 'web_nsbemp_gmail_com';
  $item->name = 'web.nsbemp@gmail.com';
  $item->subtype = 'email';
  $item->location = 'web.nsbemp@gmail.com';
  $item->settings = array();
  $export['web_nsbemp_gmail_com'] = $item;

  return $export;
}

/**
 * Implements hook_exportables_backup_migrate_profiles().
 */
function nsbe_mp_org_exportables_backup_migrate_profiles() {
  $export = array();

  $item = new stdClass();
  $item->disabled = FALSE; /* Edit this to true to make a default item disabled initially */
  $item->api_version = 1;
  $item->machine_name = 'on_server_backup';
  $item->name = 'on server backup';
  $item->filename = '[site:name]';
  $item->append_timestamp = TRUE;
  $item->timestamp_format = 'Y-m-d\\TH-i-s';
  $item->filters = array(
    'compression' => 'gzip',
    'notify_success_enable' => 0,
    'notify_success_email' => 'noreply@nsbe-mp.org',
    'notify_failure_enable' => 1,
    'notify_failure_email' => 'web.nsbemp@gmail.com',
    'utils_site_offline' => 0,
    'utils_site_offline_message' => 'NSBE Montgomery Professionals is currently under maintenance. We should be back shortly. Thank you for your patience.',
    'utils_description' => '',
    'use_cli' => 0,
    'ignore_errors' => 0,
    'sources' => array(
      'db' => array(
        'exclude_tables' => array(),
        'nodata_tables' => array(
          'cache' => 'cache',
          'cache_block' => 'cache_block',
          'cache_bootstrap' => 'cache_bootstrap',
          'cache_field' => 'cache_field',
          'cache_filter' => 'cache_filter',
          'cache_form' => 'cache_form',
          'cache_image' => 'cache_image',
          'cache_menu' => 'cache_menu',
          'cache_page' => 'cache_page',
          'cache_path' => 'cache_path',
          'cache_rules' => 'cache_rules',
          'cache_token' => 'cache_token',
          'cache_update' => 'cache_update',
          'cache_views' => 'cache_views',
          'cache_views_data' => 'cache_views_data',
          'civicrm_acl_cache' => 'civicrm_acl_cache',
          'civicrm_action_schedule' => 'civicrm_action_schedule',
          'civicrm_batch' => 'civicrm_batch',
          'civicrm_case_activity' => 'civicrm_case_activity',
          'civicrm_contact_type' => 'civicrm_contact_type',
          'civicrm_contribution_soft' => 'civicrm_contribution_soft',
          'civicrm_custom_field' => 'civicrm_custom_field',
          'civicrm_dedupe_exception' => 'civicrm_dedupe_exception',
          'civicrm_email' => 'civicrm_email',
          'civicrm_entity_tag' => 'civicrm_entity_tag',
          'civicrm_file' => 'civicrm_file',
          'civicrm_grant' => 'civicrm_grant',
          'sessions' => 'sessions',
        ),
        'utils_lock_tables' => 0,
      ),
      'files' => array(
        'exclude_filepaths' => 'backup_migrate
styles
css
js
ctools
less',
      ),
      'archive' => array(
        'exclude_filepaths' => 'public://backup_migrate
public://styles
public://css
public://js
public://ctools
public://less
private://backup_migrate
sites/default/settings.php
/tmp',
      ),
    ),
  );
  $export['on_server_backup'] = $item;

  return $export;
}
