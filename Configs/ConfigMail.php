<?php

namespace Configs;


class ConfigMail
{
    /**
     * smtp host
     * @var string
     */
    const SMTP_HOST = 'smtp.gmail.com';

    /**
     * smtp auth
     * @var string
     */
    const SMTP_AUTH = true;

    /**
     * smtp name
     * @var string
     */
    const SMTP_USERNAME = 'softservetest22@gmail.com';

    /**
     * smtp password
     * @var string
     */
    const SMTP_PASSWORD = 'softservetest22159357';

    /**
     * SMTP PORT
     * @var int
     */
    const SMTP_PORT = 587;

    /**
     * SMTP SECURE
     * @var string
     */
    const SMTPSECURE = 'tls';

    /**
     * Send from
     * @var string
     */
    const SET_FROM = 'softservetest22@gmail.com';

    /**
     * Debug server
     * @var int
     */
    const SMTP_DEBUG = 0;
}