<?php
use CRM_Creategroups_ExtensionUtil as E;

/**
 * Group.Createmany API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @see https://docs.civicrm.org/dev/en/latest/framework/api-architecture/
 */
function _civicrm_api3_group_Createmany_spec(&$spec) {
  $spec['number_to_create']['api.required'] = 1;
}

/**
 * Group.Createmany API
 *
 * @param array $params
 *
 * @return array
 *   API result descriptor
 *
 * @see civicrm_api3_create_success
 *
 * @throws API_Exception
 */
function civicrm_api3_group_Createmany($params) {
  if (array_key_exists('number_to_create', $params) && (is_integer((int)$params['number_to_create']))) {
    $returnValues = [];
    for ($count = 0; $count < $params['number_to_create']; $count++) {
      $groupGetCount = civicrm_api3('Group', 'getcount', [
        'options' => ['limit' => 0],
      ]);
      $groupNumber = (int)$groupGetCount + 1;
      $returnValues[] = civicrm_api3('Group', 'create', [
        'title' => "TestGroup".(string)$groupNumber,
      ]);
    }
    return civicrm_api3_create_success($returnValues, $params, 'Group', 'Createmany');
  }
  else {
    throw new API_Exception('number_to_create is a required parameter', 'number_to_create_not_specified');
  }
}
