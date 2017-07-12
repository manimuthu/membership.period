<?php

class CRM_History_BAO_Membershipperiod extends CRM_History_DAO_Membershipperiod {

  /**
   * Create a new Membershipperiod based on array-data
   *
   * @param array $params key-value pairs
   * @return CRM_History_DAO_Membershipperiod|NULL
   *
  public static function create($params) {
    $className = 'CRM_History_DAO_Membershipperiod';
    $entityName = 'Membershipperiod';
    $hook = empty($params['id']) ? 'create' : 'edit';

    CRM_Utils_Hook::pre($hook, $entityName, CRM_Utils_Array::value('id', $params), $params);
    $instance = new $className();
    $instance->copyValues($params);
    $instance->save();
    CRM_Utils_Hook::post($hook, $entityName, $instance->id, $instance);

    return $instance;
  } */

}
