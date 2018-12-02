<?php
/**
 * @file
 * nsbe_mp_org.features.user_role.inc
 */

/**
 * Implements hook_user_default_roles().
 */
function nsbe_mp_org_user_default_roles() {
  $roles = array();

  // Exported role: administrator.
  $roles['administrator'] = array(
    'name' => 'administrator',
    'weight' => 5,
  );

  // Exported role: local member.
  $roles['local member'] = array(
    'name' => 'local member',
    'weight' => 4,
  );

  // Exported role: non-validated.
  $roles['non-validated'] = array(
    'name' => 'non-validated',
    'weight' => 1,
  );

  // Exported role: validated user.
  $roles['validated user'] = array(
    'name' => 'validated user',
    'weight' => 3,
  );

  return $roles;
}
