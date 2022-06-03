<?php
use CRM_Creategroups_ExtensionUtil as E;

/**
 * Group.Deletemany API specification (optional)
 * This is used for documentation and validation.
 *
 * @param array $spec description of fields supported by this API call
 *
 * @see https://docs.civicrm.org/dev/en/latest/framework/api-architecture/
 */
function _civicrm_api3_group_Deletemany_spec(&$spec) {
  $spec['number_to_delete']['api.required'] = 1;
}

/**
 * Group.Deletemany API
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
function civicrm_api3_group_Deletemany($params) {
  if (array_key_exists('number_to_delete', $params) && (is_integer((int)$params['number_to_delete']))) {
    $returnValues = [];
    $groupCount = civicrm_api3('Group', 'getcount', [
      'options' => ['limit' => 0],
    ]);
    if ($groupCount > $params['number_to_delete']) {
      $groups = \Civi\Api4\Group::get()
        ->addSelect('id')
        ->addWhere('title', 'LIKE', "TestGroup%")
        ->addOrderBy('id', 'DESC')
        ->setLimit($params['number_to_delete'])
        ->execute();
      foreach ($groups as $group) {
        $returnValues[] = ['Deleting group '.$group['id'] =>
          civicrm_api3('Group', 'delete', [
            'id' => $group['id'],
          ])
        ];
      }
      return civicrm_api3_create_success($returnValues, $params, 'Group', 'Createmany');
    }
    else {
      throw new API_Exception('Number of groups available should exceed the number to delete, because at a minimum, the Administrator group should remain; '.$params['number_to_delete'].' specified but only '.$groupCount.' available' , 'number_to_delete_excessive');
    }
  }
  else {
    throw new API_Exception('number_to_delete is a required parameter', 'number_to_delete_not_specified');
  }
}
