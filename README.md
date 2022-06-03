# au.org.asylumseekerscentre.creategroups

This extension creates and deletes CiviCRM Groups for testing purposes.

WARNING! This extension is only intended for use in Development environments. Do not install on Production sites!
--------

The extension is licensed under [AGPL-3.0](LICENSE.txt).

## Requirements

This extension has been tested with the following software:

* PHP v7.3
* CiviCRM 5.49.4

## Installation (Web UI)

Learn more about installing CiviCRM extensions in the [CiviCRM Sysadmin Guide](https://docs.civicrm.org/sysadmin/en/latest/customize/extensions/).

## Installation (CLI, Zip)

Sysadmins and developers may download the `.zip` file for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
cd <extension-dir>
cv dl au.org.asylumseekerscentre.creategroups@https://github.com/asylumseekerscentre/au.org.asylumseekerscentre.creategroups/archive/main.zip
```

## Installation (CLI, Git)

Sysadmins and developers may clone the [Git](https://en.wikipedia.org/wiki/Git) repo for this extension and
install it with the command-line tool [cv](https://github.com/civicrm/cv).

```bash
git clone https://github.com/asylumseekerscentre/au.org.asylumseekerscentre.creategroups.git
cv en creategroups
```

## Getting Started

Using the API Explorer (v3), you can call Group.createmany and Group.deletemany. Created groups will have a title beginning with "TestGroup" followed by a number. Deleted groups should be limited to those which begin with "TestGroup". Please ensure that you have a backup before creating or deleting groups with this extension.

The purpose of this extension is to demonstrate an issue with large numbers of groups (~475+) on webform-civicrm forms.

