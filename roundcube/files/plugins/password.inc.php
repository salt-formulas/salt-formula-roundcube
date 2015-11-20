<?php
// Password Plugin options
// -----------------------
// A driver to use for password change. Default: "sql".
// See README file for list of supported driver names.
$rcmail_config['password_driver'] = 'sql';

// Determine whether current password is required to change password.
// Default: false.
$rcmail_config['password_confirm_current'] = true;

// Require the new password to be a certain length.
// set to blank to allow passwords of any length
$rcmail_config['password_minimum_length'] = 0;

// Require the new password to contain a letter and punctuation character
// Change to false to remove this check.
$rcmail_config['password_require_nonalpha'] = false;

// Enables logging of password changes into logs/password
$rcmail_config['password_log'] = true;

// SQL Driver options
// ------------------
// PEAR database DSN for performing the query. By default
// Roundcube DB settings are used.
#$rcmail_config['password_db_dsn'] = 'mysql://mailserver:xxx@localhost/mailserver';

// The SQL query used to change the password.
// The query can contain the following macros that will be expanded as follows:
//      %p is replaced with the plaintext new password
//      %c is replaced with the crypt version of the new password, MD5 if available
//         otherwise DES.
//      %D is replaced with the dovecotpw-crypted version of the new password
//      %o is replaced with the password before the change
//      %n is replaced with the hashed version of the new password
//      %q is replaced with the hashed password before the change
//      %h is replaced with the imap host (from the session info)
//      %u is replaced with the username (from the session info)
//      %l is replaced with the local part of the username
//         (in case the username is an email address)
//      %d is replaced with the domain part of the username
//         (in case the username is an email address)
// Escaping of macros is handled by this module.
// Default: "SELECT update_passwd(%c, %u)"
$rcmail_config['password_query'] = "UPDATE `mailserver`.`mailbox` SET password = %n where username = %u";

// Using a password hash for %n and %q variables.
// Determine which hashing algorithm should be used to generate
// the hashed new and current password for using them within the
// SQL query. Requires PHP's 'hash' extension.
$rcmail_config['password_hash_algorithm'] = 'md5';
?>
