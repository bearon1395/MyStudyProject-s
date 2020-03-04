# MyStudyProject-s
<img src="/fullpage.png" alt="fullpage.png" style="width: 100%;">

This site have 2-step validation.
1. Validate on client before send data (js).
2. Validate on server (php).

On client:
function validateForm checks
- name for only letters (/^\D+$/)
- number for the presence of only digits of at least 7 (^[0-9]{7,}$)
- mail checks on <input type="email">
when data are true, sends on mailsendler.php

On server:
 received data сlears and checks:
- name and number are checked as in the previous
- mail is checked using  filter_var($email, FILTER_VALIDATE_EMAIL)

When type of data is true, next check for length
If date is true, generating mail format:

To: maksym@example.com
Subject: New request from Art Clay
X-PHP-Originating-Script: 0:mailsendler.php
Content-Type: text/plain; charset=utf-8
From: <artclay@gmail.com>

Name: Bohdan Serdiuk

Phone: 0999999999

E-mail: example@gmail.com
