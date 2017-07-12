## Membership Periods

Developed July 12, 2017

Membership period extention is developed and integrated in civicrm, that will record and store every start and end date of membership periods

## Documentation

#For installation instructions,
Download the extension from github link and place into your civicrm folder and enable the extension in Extentions page in your civicrm

Administer -> System Settings -> Extensions

## In Details

Module Name   `membership.history`

Entity Name   `civicrm_membershipperiod`

API Name      `Membershipperiod`

Hook used     `history_civicrm_triggerInfo(&$info, $tableName)`

Page to display ./civicrm/membership-period?cid=2&membership_id=4

## Logic 
After installing the extention it will start working with CIVICRM. Whenever a membership is created or renewed the membership periods will be recorded using the hook `history_civicrm_triggerInfo` in `civicrm_membershipperiod`. To view the period there is a drop down menu named `History` near `Renew` option.This will list all the periods in a page `membership-period` from the table with respect to membership_is and customer_id.

