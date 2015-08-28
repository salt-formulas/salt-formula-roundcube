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
