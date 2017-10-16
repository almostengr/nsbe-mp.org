<?php
/**
 * @file
 * nsbe_mp_org.features.inc
 */

/**
 * Implements hook_ctools_plugin_api().
 */
function nsbe_mp_org_ctools_plugin_api($module = NULL, $api = NULL) {
  if ($module == "backup_migrate" && $api == "backup_migrate_exportables") {
    return array("version" => "1");
  }
}

/**
 * Implements hook_views_api().
 */
function nsbe_mp_org_views_api($module = NULL, $api = NULL) {
  return array("api" => "3.0");
}

/**
 * Implements hook_node_info().
 */
function nsbe_mp_org_node_info() {
  $items = array(
    'article' => array(
      'name' => t('Article'),
      'base' => 'node_content',
      'description' => t('Use <em>articles</em> for time-sensitive content like news, press releases or blog posts.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'chapter_visit_request' => array(
      'name' => t('Chapter Visit Request'),
      'base' => 'node_content',
      'description' => t('Form to request a visit for NSBE MP to visit your career fair, meeting, or other event. '),
      'has_title' => '1',
      'title_label' => t('Contact Name'),
      'help' => t('What is a chapter visit? Chapter visits allow for NSBE members to visit your school or event and discuss their career in a STEM field. The NSBE member(s) who attend, may give a presentation about their field of work or perform demonstrations. '),
    ),
    'officer_page' => array(
      'name' => t('Officer'),
      'base' => 'node_content',
      'description' => t('Page providing bio, image, and position of a NSBE MP officer.'),
      'has_title' => '1',
      'title_label' => t('Officer Name'),
      'help' => '',
    ),
    'page' => array(
      'name' => t('Basic page'),
      'base' => 'node_content',
      'description' => t('Use <em>basic pages</em> for your static content, such as an \'About us\' page.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'scholarship_application' => array(
      'name' => t('Scholarship Application'),
      'base' => 'node_content',
      'description' => t('Submit a scholarship application to be considered for the NSBE MP Scholarship.'),
      'has_title' => '1',
      'title_label' => t('Title'),
      'help' => '',
    ),
    'stem_project' => array(
      'name' => t('STEM Project'),
      'base' => 'node_content',
      'description' => t('To post a STEM related project that have been performed in the past by NSBE MP or CA NSBE Jr.'),
      'has_title' => '1',
      'title_label' => t('Project Name'),
      'help' => '',
    ),
  );
  drupal_alter('node_info', $items);
  return $items;
}
