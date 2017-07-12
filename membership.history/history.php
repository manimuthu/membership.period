<?php

require_once 'history.civix.php';

/**
 * Implements hook_civicrm_config().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_config
 */
function history_civicrm_config(&$config) {
  _history_civix_civicrm_config($config);
}

/**
 * Implements hook_civicrm_xmlMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_xmlMenu
 */
function history_civicrm_xmlMenu(&$files) {
  _history_civix_civicrm_xmlMenu($files);
}

/**
 * Implements hook_civicrm_install().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_install
 */
function history_civicrm_install() {
  _history_civix_civicrm_install();
}

/**
 * Implements hook_civicrm_postInstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_postInstall
 */
function history_civicrm_postInstall() {
  _history_civix_civicrm_postInstall();
}

/**
 * Implements hook_civicrm_uninstall().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_uninstall
 */
function history_civicrm_uninstall() {
  _history_civix_civicrm_uninstall();
}

/**
 * Implements hook_civicrm_enable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_enable
 */
function history_civicrm_enable() {
  _history_civix_civicrm_enable();
}

/**
 * Implements hook_civicrm_disable().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_disable
 */
function history_civicrm_disable() {
  _history_civix_civicrm_disable();
}

/**
 * Implements hook_civicrm_upgrade().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_upgrade
 */
function history_civicrm_upgrade($op, CRM_Queue_Queue $queue = NULL) {
  return _history_civix_civicrm_upgrade($op, $queue);
}

/**
 * Implements hook_civicrm_managed().
 *
 * Generate a list of entities to create/deactivate/delete when this module
 * is installed, disabled, uninstalled.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_managed
 */
function history_civicrm_managed(&$entities) {
  _history_civix_civicrm_managed($entities);
}

/**
 * Implements hook_civicrm_caseTypes().
 *
 * Generate a list of case-types.
 *
 * Note: This hook only runs in CiviCRM 4.4+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_caseTypes
 */
function history_civicrm_caseTypes(&$caseTypes) {
  _history_civix_civicrm_caseTypes($caseTypes);
}

/**
 * Implements hook_civicrm_angularModules().
 *
 * Generate a list of Angular modules.
 *
 * Note: This hook only runs in CiviCRM 4.5+. It may
 * use features only available in v4.6+.
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_angularModules
 */
function history_civicrm_angularModules(&$angularModules) {
  _history_civix_civicrm_angularModules($angularModules);
}

/**
 * Implements hook_civicrm_alterSettingsFolders().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_alterSettingsFolders
 */
function history_civicrm_alterSettingsFolders(&$metaDataFolders = NULL) {
  _history_civix_civicrm_alterSettingsFolders($metaDataFolders);
}

// --- Functions below this ship commented out. Uncomment as required. ---

/**
 * Implements hook_civicrm_preProcess().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_preProcess
 *
function history_civicrm_preProcess($formName, &$form) {

} // */

/**
 * Implements hook_civicrm_navigationMenu().
 *
 * @link http://wiki.civicrm.org/confluence/display/CRMDOC/hook_civicrm_navigationMenu
 *
function history_civicrm_navigationMenu(&$menu) {
  _history_civix_insert_navigation_menu($menu, NULL, array(
    'label' => ts('The Page', array('domain' => 'membership.history')),
    'name' => 'the_page',
    'url' => 'civicrm/the-page',
    'permission' => 'access CiviReport,access CiviContribute',
    'operator' => 'OR',
    'separator' => 0,
  ));
  _history_civix_navigationMenu($menu);
} // */


/**
 * Implementation of hook_civicrm_entityTypes
 */
function history_civicrm_entityTypes(&$entityTypes) {
  $entityTypes['CRM_History_DAO_Membershipperiod'] = array(
    'name' => 'Membershipperiod',
    'class' => 'CRM_History_DAO_Membershipperiod',
    'table' => 'civicrm_membershipperiod'
  );
}

/**
 * Hook to record individual membership periods
 */

function history_civicrm_triggerInfo(&$info, $tableName) {
  $sourceTable = 'civicrm_membership';

  $sql = "INSERT INTO `civicrm`.`civicrm_membershipperiod` 
         (`id`, `membership_id`, `start_date`, `end_date`) VALUES (NULL, NEW.id, NEW.start_date, NEW.end_date);";

  $info[] = array(
      'table' => $sourceTable,
      'when' => 'AFTER',
      'event' => 'INSERT',
      'sql' => $sql,
  );
/*
  $sql = "update `civicrm`.`civicrm_membershipperiod` set start_date=NEW.start_date, end_date=NEW.end_date 
        where start_date=OLD.start_date and end_date=OLD.end_date and membership_id=OLD.id;";
 */

  $sql = "INSERT INTO `civicrm`.`civicrm_membershipperiod` 
         (`id`, `membership_id`, `start_date`, `end_date`) VALUES (NULL, OLD.id, NEW.start_date, NEW.end_date);";

  $info[] = array(
      'table' => $sourceTable,
      'when' => 'AFTER',
      'event' => 'UPDATE',
      'sql' => $sql,
  );
 
  $sql = "delete from `civicrm`.`civicrm_membershipperiod` where membership_id=OLD.id;";
 $sourceTable = 'civicrm_membership';
  $info[] = array(
      'table' => $sourceTable,
      'when' => 'AFTER',
      'event' => 'DELETE',
      'sql' => $sql,
  );
}
