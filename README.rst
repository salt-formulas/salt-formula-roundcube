=======
roundcube
=======

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

Optional
--------

- glusterfs (to serve as mail storage backend)
- postfix
- roundcube

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
      roundcube_origin: mail.eru
      mysql_mailserver_password: Peixeilaephahmoosa2daihoh4yiaThe
    roundcube:
      server:
        origin: ${_param:roundcube_origin}
    mysql:
      server:
        database:
          mailserver:
            encoding: UTF8
            locale: cs_CZ
            users:
            - name: mailserver
              password: ${_param:mysql_mailserver_password}
              host: 127.0.0.1
              rights: all privileges
    apache:
      server:
        site:
          roundcubeadmin:
            enabled: true
            type: static
            name: roundcubeadmin
            root: /usr/share/roundcubeadmin
            host:
              name: ${_param:roundcube_origin}
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
        origin: ${_param:roundcube_origin}
        admin:
          enabled: false

Read more
=========

* http://wiki2.roundcube.org/
