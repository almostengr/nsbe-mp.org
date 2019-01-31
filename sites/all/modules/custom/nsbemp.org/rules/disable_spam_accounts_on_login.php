{ "rules_disable_spam_accounts_on_login" : {
    "LABEL" : "Disable Spam accounts on login",
    "PLUGIN" : "reaction rule",
    "OWNER" : "rules",
    "REQUIRES" : [ "rules" ],
    "ON" : { "user_login" : [], "user_update" : [] },
    "IF" : [
      { "OR" : [
          { "text_matches" : {
              "text" : [ "account:mail" ],
              "match" : "mail.ru\r\nmailstome.today\r\nbongobongo.usa.cc",
              "operation" : "regex"
            }
          },
          { "text_matches" : { "text" : [ "account:mail" ], "match" : "spambog" } }
        ]
      }
    ],
    "DO" : [
      { "user_block" : { "account" : [ "account" ] } },
      { "drupal_message" : {
          "message" : "Your user account has been blocked based on your email address. If you feel that this has been done in error, please contact us via the \u0022Contact Us\u0022 page.",
          "type" : "warning",
          "repeat" : "0"
        }
      }
    ]
  }
}

