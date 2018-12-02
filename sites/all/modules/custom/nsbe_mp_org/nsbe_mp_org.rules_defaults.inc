<?php
/**
 * @file
 * nsbe_mp_org.rules_defaults.inc
 */

/**
 * Implements hook_default_rules_configuration().
 */
function nsbe_mp_org_default_rules_configuration() {
  $items = array();
  $items['rules_redirect_for_ca_nsbejr_org'] = entity_import('rules_config', '{ "rules_redirect_for_ca_nsbejr_org" : {
      "LABEL" : "redirect for ca-nsbejr.org",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "TAGS" : [ "ca-nsbejr.org", "cansbe", "nsbe" ],
      "REQUIRES" : [ "rules" ],
      "ON" : { "init" : [] },
      "IF" : [
        { "OR" : [
            { "data_is" : { "data" : [ "site:url" ], "value" : "ca-nsbejr.org" } },
            { "data_is" : { "data" : [ "site:url" ], "value" : "www.ca-nsbejr.org" } }
          ]
        }
      ],
      "DO" : [ { "redirect" : { "url" : "central-alabama-nsbe-jr" } } ]
    }
  }');
  $items['rules_submit_chapter_visit_request'] = entity_import('rules_config', '{ "rules_submit_chapter_visit_request" : {
      "LABEL" : "submit chapter visit request",
      "PLUGIN" : "reaction rule",
      "OWNER" : "rules",
      "TAGS" : [ "chapter", "request", "visit" ],
      "REQUIRES" : [ "rules" ],
      "ON" : {
        "node_insert--chapter_visit_request" : { "bundle" : "chapter_visit_request" },
        "node_update--chapter_visit_request" : { "bundle" : "chapter_visit_request" }
      },
      "DO" : [
        { "node_unpublish" : { "node" : [ "node" ] } },
        { "drupal_message" : {
            "message" : "We will review your request and provide a response within 7 business days of being able to attend your event. ",
            "repeat" : "0"
          }
        },
        { "mail" : {
            "to" : "pres.nsbemp@gmail.com; vicepres.nsbemp@gmail.com; sect.nsbemp@gmail.com; treas.nsbemp@gmail.com; parl.nsbemp@gmail.com; pres.emeritus.nsbemp@gmail.com",
            "subject" : "Chapter Visit Request - [node:field_visit_date] - [node:field-visit-location]",
            "message" : "Contact: [node:title]\\t\\r\\nPhone Number: [node:field-phone-number]\\t\\r\\nEmail Address: [node:field-email-address]\\t\\r\\nLocation: [node:field-visit-location]\\t\\r\\nDate(s): [node:field-visit-date]\\t\\r\\nDetails: [node:field-visit-details]\\t\\r\\nCreated: [node:created]\\t\\r\\nURL: [node:url]\\t",
            "from" : [ "node:field-email-address" ],
            "language" : [ "" ]
          }
        }
      ]
    }
  }');
  return $items;
}
