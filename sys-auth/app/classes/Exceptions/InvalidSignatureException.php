<?php

# Prevent direct file access
if (!defined('APP')) {
    die(header("HTTP/1.1 403 Forbidden"));
}

class InvalidSignatureException extends Exception
{
    // ... code
}
