=========
roundcube
=========

Install and configure roundcube.

Available states
================

.. contents::
    :local:

``roundcube.server``
------------------

Setup roundcube server

Available metadata
==================

.. contents::
    :local:

``metadata.roundcube.server``
---------------------------

Setup roundcube server

Requirements
============

- linux
- mysql (for mysql backend)
- `dovecot <https://github.com/tcpcloud/salt-dovecot-formula>`_

Configuration parameters
========================

For complete list of parameters, please check
``metadata/service/server.yml``

Example reclass
===============

Server
------

.. code-block:: yaml

   classes:
     - service.roundcube.server
   parameters:
    _param:
      postfix_origin: mail.eru
      mysql_roundcube_password: changeme
    roundcube:
      force_https: false
      mail:
        host: ${_param:postfix_origin}
    mysql:
      server:
        database:
          roundcube:
            encoding: UTF8
            locale: cs_CZ
            users:
            - name: roundcube
              password: ${_param:mysql_roundcube_password}
              host: 127.0.0.1
              rights: all privileges
    apache:
      server:
        site:
          roundcube:
            enabled: true
            type: static
            name: roundcube
            root: /usr/share/roundcube
            host:
              name: ${_param:postfix_origin}
              aliases:
                - ${linux:system:name}.${linux:system:domain}
                - ${linux:system:name}

Example pillar
==============

Server
------

.. code-block:: yaml

    roundcube:
      server:
        mail:
          host: mail.cloudlab.cz
        session:
          # 24 random characters
          des_key: 'Ckhuv6VW6iUdbxpovKzhbepk'
          # 30 minutes
          lifetime: 30
        plugins:
          - archive
          - zipdownload
          - newmail_notifier

Read more
=========

* https://roundcube.net/

Documentation and Bugs
======================

To learn how to install and update salt-formulas, consult the documentation
available online at:

    http://salt-formulas.readthedocs.io/

In the unfortunate event that bugs are discovered, they should be reported to
the appropriate issue tracker. Use Github issue tracker for specific salt
formula:

    https://github.com/salt-formulas/salt-formula-roundcube/issues

For feature requests, bug reports or blueprints affecting entire ecosystem,
use Launchpad salt-formulas project:

    https://launchpad.net/salt-formulas

You can also join salt-formulas-users team and subscribe to mailing list:

    https://launchpad.net/~salt-formulas-users

Developers wishing to work on the salt-formulas projects should always base
their work on master branch and submit pull request against specific formula.

    https://github.com/salt-formulas/salt-formula-roundcube

Any questions or feedback is always welcome so feel free to join our IRC
channel:

    #salt-formulas @ irc.freenode.net
